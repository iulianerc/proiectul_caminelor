<?php


namespace App\Services;

use App\Models\Permission\AccessLevel;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class PermissionService - Сервис для обработки прав доступа
 * @package App\Services
 */
class OldPermissionService
{
    /**
     * @var $permissions - Права доступа
     */
    private $permissions;

    /**
     * @var Collection $accessLevels - Уровни доступа
     */
    private Collection $accessLevels;

    /**
     * @var array - Структура правила доступа в dataObject
     */
    private array $permissionContainer;

    public const PERMISSION_CONTAINER_TEMPLATE = [
        'levels' => null,
        'fields' => [],
        'param'  => [],
    ];

    public function handlePermissionTree(array &$permissionTree): void
    {
        if (isset($permissionTree['groups'])) {
            foreach ($permissionTree['groups'] as $groupName => $groupValue) {
                $permissionTree['groups'][$groupName]['title'] = __("global/permissions.groups.{$groupName}");
                if (isset($groupValue['modules'])) {
                    foreach ($groupValue['modules'] as $moduleName => $moduleValue) {
                        $permissionTree['groups'][$groupName]['modules'][$moduleName]['title'] = __("modules/{$moduleName}.model.multiple");
                        if (isset($moduleValue['actions'])) {
                            $this->handleLevelsAndFields(
                                $moduleValue['actions'],
                                "modules/{$moduleName}.",
                                $permissionTree['groups'][$groupName]['modules'][$moduleName]['actions'],
                                false);
                        }
                        if (isset($moduleValue['rules'])) {
                            $this->handleLevelsAndFields(
                                $moduleValue['rules'],
                                "modules/{$moduleName}.rules.",
                                $permissionTree['groups'][$groupName]['modules'][$moduleName]['rules']);
                        }
                    }
                }
                if (isset($groupValue['rules'])) {
                    $this->handleLevelsAndFields(
                        $groupValue['rules'],
                        'rules/',
                        $permissionTree['groups'][$groupName]['rules']);
                }
            }
        }
    }

    private function handleLevelsAndFields($items, $path, &$container, $isRules = true): void
    {
            foreach ($items as $name => $value) {
                $container[$name]['title'] = __($isRules ? "{$path}{$name}.title" : "{$path}actions.{$name}");
                if (isset($value['levels'])) {
                    $temp = [];
                    foreach ($value['levels'] as $level) {
                        $temp[] = [
                            'value' => $level,
                            'text'  => __("global/permissions.levels.{$level}")
                        ];
                    }
                    $container[$name]['levels'] = $temp;
                }
                if (isset($value['fields'])) {
                    $temp = [];
                    foreach ($value['fields'] as $field) {
                        $temp[] = [
                            'value' => $field,
                            'text'  => __("{$path}fields.{$field}.title")
                        ];
                    }
                    $container[$name]['fields'] = $temp;
                }
            }
    }

    /**
     * Получение имеющихся прав доступа у роли
     *
     * @param Role $role - роль
     * @param array $permissionTree - структура прав доступа
     * @return array - имеющиеся права доступа у роли
     * @throws Exception
     */
    public function getDataObject(Role $role, array &$permissionTree): array
    {
        $dataObject = [];
        // устанавливаем текущие права доступа
        $this->setPermissions($role->getAllPermissions()->keyBy('name'));
        // устанавливаем текущие уровни доступа
        $this->setAccessLevels(AccessLevel::all()->pluck('name', 'id'));
        // обходим массив с деревом прав доступа для формирования dataObject - имеющиеся права
        foreach ($permissionTree as $groupName => $groupValue) {
            // обходим права доступа на модули
            if (isset($groupValue['modules'])) {
                foreach ($groupValue['modules'] as $moduleName => $moduleValue) {
                    // обходим права доступа на действия модуля
                    if (isset($moduleValue['actions'])) {
                        foreach ($moduleValue['actions'] as $name => $value) {
                            // обходим все уровни доступа и проверяем на наличие data_source для передачи данных в дочерний элемент
                            foreach ($value['levels'] as $key => $level) {
                                if (isset($level['data_source'])) {
                                    $permissionTree[$groupName]['modules'][$moduleName]['actions'][$name]['levels'][$key]['children'] = $level['data_source']();
                                }
                            }
                            // устанавливаем название
                            $permissionTree[$groupName]['actions'][$name] = $value['title'];
                            // создаем контейнер для дальнейшего приведения к определённому формату
                            $this->setPermissionContainer($value['name']);
                            // приводим контейнер к определённому формату
                            $dataObject[$groupName]['modules'][$moduleName]['actions'][$value['name']] = $this->getPermissionContainer();
                        }
                    }
                    // обходим права доступа на отдельные правила для модуля
                    if (isset($moduleValue['rules'])) {
                        foreach ($moduleValue['rules'] as $name => $value) {
                            // создаем контейнер для дальнейшего приведения к определённому формату
                            $this->setPermissionContainer($value['name']);
                            // приводим контейнер к определённому формату
                            $dataObject[$groupName]['modules'][$moduleName]['rules'][$value['name']] = $this->getPermissionContainer();
                        }
                    }
                }
            }
            // обходим права доступа на отдельные правила
            if (isset($groupValue['rules'])) {
                foreach ($groupValue['rules'] as $name => $value) {
                    // создаем контейнер для дальнейшего приведения к определённому формату
                    $this->setPermissionContainer($value['name']);
                    // приводим контейнер к определённому формату
                    $dataObject[$groupName]['rules'][$value['name']] = $this->getPermissionContainer();
                }
            }
        }

        return $dataObject;
    }

    /**
     * Получение имеющихся прав доступа у роли
     *
     * @param array $permissionTree - структура прав доступа
     * @return array - имеющиеся права доступа у роли
     */
    public function handlePermissions(array $permissionTree): array
    {
        // устанавливаем текущие уровни доступа
        $this->setAccessLevels(AccessLevel::all()->pluck('id', 'name'));
        // обходим все права доступа и формируем данные для сохранения
        foreach ($permissionTree as $groupName => $groupValue) {
            if (isset($groupValue['modules'])) {
                foreach ($groupValue['modules'] as $moduleName => $moduleValue) {
                    // формируем права доступа на действия
                    $this->handlePermission('actions', $moduleValue);
                    // формируем права доступа для определённых правил модуля
                    $this->handlePermission('rules', $moduleValue);
                }
            }
            // формируем права доступа для определённых правил
            $this->handlePermission('rules', $groupValue);
        }

        // отправляем отформатированные права доступа для сохранения
        return $this->getPermissions();
    }

    /**
     * Формирование права доступа для сохранения
     *
     * @param string $key - ключ actions/rules
     * @param array $permissions - права доступа
     */
    private function handlePermission(string $key, array $permissions): void
    {
        if (isset($permissions[$key])) {
            foreach ($permissions[$key] as $name => $item) {
                if (!isset($item['levels'])) {
                    continue;
                }

                $item['access_level'] = $this->getAccessLevels()[$item['levels']];
                $this->permissions[$name] = $item;
            }
        }
    }

    /**
     * Получение прав доступа
     *
     * @return mixed
     */
    private function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Установление прав доступа
     *
     * @param Collection $permissions
     */
    private function setPermissions(Collection $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * Получение уровней доступа
     *
     * @return mixed
     */
    private function getAccessLevels()
    {
        return $this->accessLevels;
    }

    /**
     * Установление уровней доступа
     *
     * @param Collection $accessLevels
     */
    private function setAccessLevels(Collection $accessLevels): void
    {
        $this->accessLevels = $accessLevels;
    }

    /**
     * Получение правила доступа
     *
     * @return array|null
     */
    private function getPermissionContainer(): ?array
    {
        return $this->permissionContainer;
    }

    /**
     * Установление правила доступа
     *
     * @param string $permissionName - правило доступа
     */
    private function setPermissionContainer(string $permissionName): void
    {
        $this->permissionContainer = self::PERMISSION_CONTAINER_TEMPLATE;
        if ($this->getPermissions()->has($permissionName)) {
            $this->permissionContainer = [
                'levels' => $this->getAccessLevels()[$this->getPermissions()[$permissionName]->pivot->access_level_id],
                'fields' => decode($this->getPermissions()[$permissionName]->pivot->fields) ?? [],
                'params' => decode($this->getPermissions()[$permissionName]->pivot->params) ?? []
            ];
        }
    }

    private function getAllPermissions(array $permissionTree): array
    {
        $permissions = [];
        if (isset($permissionTree['groups'])) {
            foreach ($permissionTree['groups'] as $groupName => $groupValue) {
                if (isset($groupValue['modules'])) {
                    foreach ($groupValue['modules'] as $moduleName => $moduleValue) {
                            if (isset($moduleValue['actions'])) {
                                foreach ($moduleValue['actions'] as $actionValue) {
                                    $permissions[] = $actionValue['name'];
                                }
                        }
                        if (isset($moduleValue['rules'])) {
                            foreach ($moduleValue['rules'] as $ruleValue) {
                                $permissions[] = $ruleValue['name'];
                            }
                        }
                    }
                }
                if (isset($groupValue['rules'])) {
                    foreach ($groupValue['rules'] as $ruleValue) {
                        $permissions[] = $ruleValue['name'];
                    }
                }
            }
        }

        return $permissions;
    }

    public function getNewPermissions(array $permissionTree, array &$permissions): array
    {
        $permissionsToCreate = [];
        // получаем права доступа записанные в permission_tree
        $treePermissions = $this->getAllPermissions($permissionTree);
        // обрабатываем выбранные права доступа для роли
        $permissions = $this->handlePermissions($permissions);
        // получаем только названия прав доступа
        $permissionKeys = array_keys($permissions);
        // получаем созданные права доступа
        $createdPermissions = Permission::get(['name'])->pluck('name')->toArray();
        // получаем новые права доступа, которых ещё нет в БД
        $newPermissions = array_diff($permissionKeys, $createdPermissions);
        // проверяем если новые права доступа находятся в permission_tree (валидация)
        $newValidatedPermissions = array_intersect($newPermissions, $treePermissions);
        if ($newValidatedPermissions) {
            // готовим новые права доступа к созданию
            foreach ($newValidatedPermissions as $permissionName) {
                $permissionsToCreate[] = ['name' => $permissionName, 'guard_name' => 'api'];
            }
        }

        return $permissionsToCreate;
    }
}
