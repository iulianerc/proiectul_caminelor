<?php


namespace App\Services\Permission;


use App\Models\Permission\Permission;
use App\Models\Role\Role;
use Illuminate\Support\Collection;

class PermissionHandler
{
    private Collection $permissions;

    public const PERMISSION_CONTAINER_TEMPLATE
        = [
            'levels' => null,
            'fields' => [],
            'param'  => [],
        ];

    public function handle(array &$permissionTree): void
    {
        if (isset($permissionTree['groups'])) {
            foreach ($permissionTree['groups'] as $groupName => $groupValue) {
                $permissionTree['groups'][$groupName]['title'] = __("global/permissions.groups.{$groupName}");
                if (isset($groupValue['modules'])) {
                    foreach ($groupValue['modules'] as $moduleName => $moduleValue) {
                        $permissionTree['groups'][$groupName]['modules'][$moduleName]['title']
                            = __("modules/{$moduleName}.model.multiple");
                        if (isset($moduleValue['actions'])) {
                            $this->format(
                                $moduleValue['actions'],
                                "modules/{$moduleName}.",
                                $permissionTree['groups'][$groupName]['modules'][$moduleName]['actions'],
                                false);
                        }
                        if (isset($moduleValue['rules'])) {
                            $this->format(
                                $moduleValue['rules'],
                                "modules/{$moduleName}.rules.",
                                $permissionTree['groups'][$groupName]['modules'][$moduleName]['rules']);
                        }
                    }
                }
                if (isset($groupValue['rules'])) {
                    $this->format(
                        $groupValue['rules'],
                        'rules/',
                        $permissionTree['groups'][$groupName]['rules']);
                }
            }
        }
    }

    private function format($items, $path, &$container, $isRules = true): void
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
     * @param  Role  $role  - роль
     * @param  array  $permissionTree  - структура прав доступа
     *
     * @return array - имеющиеся права доступа у роли
     */
    public function getDataObject(Role $role, array &$permissionTree): array
    {
        $dataObject = [];
        // устанавливаем текущие права доступа
        $this->permissions = $role->getAllPermissions()->keyBy('name');
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
                                    $permissionTree[$groupName]['modules'][$moduleName]['actions'][$name]['levels'][$key]['children']
                                        = $level['data_source']();
                                }
                            }
                            // устанавливаем название
                            $permissionTree[$groupName]['actions'][$name] = $value['title'];
                            // приводим контейнер к определённому формату
                            $dataObject[$groupName]['modules'][$moduleName]['actions'][$value['name']]
                                = $this->getPermissionContainer($value['name']);
                        }
                    }
                    // обходим права доступа на отдельные правила для модуля
                    if (isset($moduleValue['rules'])) {
                        foreach ($moduleValue['rules'] as $name => $value) {
                            // приводим контейнер к определённому формату
                            $dataObject[$groupName]['modules'][$moduleName]['rules'][$value['name']]
                                = $this->getPermissionContainer($value['name']);
                        }
                    }
                }
            }
            // обходим права доступа на отдельные правила
            if (isset($groupValue['rules'])) {
                foreach ($groupValue['rules'] as $name => $value) {
                    // приводим контейнер к определённому формату
                    $dataObject[$groupName]['rules'][$value['name']] = $this->getPermissionContainer($value['name']);
                }
            }
        }

        return $dataObject;
    }

    private function getPermissionContainer(string $permissionName): array
    {
        if ($this->permissions->has($permissionName)) {
            return [
                'levels' => $this->permissions[$permissionName]->pivot->access_level,
                'fields' => $this->permissions[$permissionName]->pivot->fields ?? [],
                'params' => $this->permissions[$permissionName]->pivot->params ?? []
            ];
        }

        return self::PERMISSION_CONTAINER_TEMPLATE;
    }

    private function getNewPermissions(array $permissionTree, array &$permissions): array
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
                $permissionsToCreate[] = [
                    'name'       => $permissionName,
                    'guard_name' => 'api',
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        return $permissionsToCreate;
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

    /**
     * Получение имеющихся прав доступа у роли
     *
     * @param  array  $permissionTree  - структура прав доступа
     * @return array - имеющиеся права доступа у роли
     */
    public function handlePermissions(array $permissionTree): array
    {
        $this->permissions = collect();
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
        return $this->permissions->all();
    }

    /**
     * Формирование права доступа для сохранения
     *
     * @param  string  $key  - ключ actions/rules
     * @param  array  $permissions  - права доступа
     */
    private function handlePermission(string $key, array $permissions): void
    {
        if (isset($permissions[$key])) {
            foreach ($permissions[$key] as $name => $item) {
                if (!isset($item['levels'])) {
                    continue;
                }

                $item['access_level'] = $item['levels'];
                unset($item['levels']);
                $this->permissions->put($name, $item);
            }
        }
    }

    public function handleAndCreate($allPermissions, &$permissions): void
    {
        if ($newPermissions = $this->getNewPermissions($allPermissions, $permissions)) {
            Permission::insert($newPermissions);
        }
    }

    public function giveBasePermissions(Role $role): void
    {
        Permission::findOrCreate('v1.*.live_search', 'api');
        $role->givePermissions([
            'v1.*.live_search' => ['access_level' => 'all', 'fields' => [], 'params' => []]
        ]);
    }

}
