<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemsTableSeeder extends Seeder
{
    private string $table = 'menu_items';

    public function run(): void
    {
        $authorId = app(UsersTableSeeder::class)->get(['id'])->first()->id;
        foreach ($this->getDump() as $menuItem) {
            $menuItem['author_id'] = $authorId;
            $menuItem['created_at'] = now();
            $menuItem['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($menuItem);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name_ru' => 'Меню',
                'name_ro' => 'Meniul',
                'name_en' => 'Menu',
                'icon'    => 'mdi-menu',
                'link'    => 'menu',
            ],
            [
                'name_ru' => 'Пункты меню',
                'name_ro' => 'Punctele meniului',
                'name_en' => 'Menu items',
                'icon'    => 'mdi-menu',
                'link'    => 'menu_items',
            ],
            [
                'name_ru' => 'Сортировка меню',
                'name_ro' => 'Sortarea meniului',
                'name_en' => 'Menu sort order',
                'icon'    => 'mdi-menu',
                'link'    => 'menu_items/edit_order',
            ],
            [
                'name_ru' => 'Роли',
                'name_ro' => 'Rolurile',
                'name_en' => 'Roles',
                'icon'    => 'mdi-account-switch',
                'link'    => 'roles',
            ],
            [
                'name_ru' => 'Центры',
                'name_ro' => 'Centre',
                'name_en' => 'Centers',
                'icon'    => 'mdi-account-switch',
                'link'    => 'centers',
            ],
            [
                'name_ru' => 'Аппараты',
                'name_ro' => 'Aparate',
                'name_en' => 'Equipment',
                'icon'    => 'mdi-account-switch',
                'link'    => 'equipment',
            ],
            [
                'name_ru' => 'Услуги',
                'name_ro' => 'Servicii',
                'name_en' => 'Services',
                'icon'    => 'mdi-account-switch',
                'link'    => 'services',
            ],
            [
                'name_ru' => 'Пользователи',
                'name_ro' => 'Utilizatori',
                'name_en' => 'Users',
                'icon'    => 'mdi-account-multiple',
                'link'    => 'users',
            ],
            [
                'name_ru' => 'Должности',
                'name_ro' => 'Posturi',
                'name_en' => 'Positions',
                'icon'    => 'mdi-account-search',
                'link'    => 'positions',
            ],
            [
                'name_ru' => 'Контакты',
                'name_ro' => 'Contacte',
                'name_en' => 'Contacts',
                'icon'    => 'mdi-contacts',
                'link'    => 'contacts',
            ],
            [
                'name_ru'   => 'Проекты',
                'name_ro'   => 'Proiecte',
                'name_en'   => 'Projects',
                'icon'      => 'mdi-sitemap',
                'link'      => 'projects',
                'author_id' => 1
            ],
            [
                'name_ru'   => 'Справочники',
                'name_ro'   => 'Cataloage',
                'name_en'   => 'Catalogs',
                'icon'      => 'mdi-book-multiple',
                'link'      => 'catalogs',
                'author_id' => 1
            ],
            [
                'name_ru'   => 'Система',
                'name_ro'   => 'Sistema',
                'name_en'   => 'System',
                'icon'      => 'mdi-apple-keyboard-command',
                'link'      => 'system',
                'author_id' => 1
            ],
            [
                'name_ru'   => 'Чат',
                'name_ro'   => 'Chat',
                'name_en'   => 'Messages',
                'icon'      => 'mdi-chat',
                'link'      => 'chat',
                'author_id' => 1
            ],
            [
                'name_ru' => 'Шаблоны сообщений',
                'name_ro' => 'Sabloane de mesage',
                'name_en' => 'Message templates',
                'icon'    => 'mdi-bell-sleep',
                'link'    => 'message_templates',
            ],
            [
                'name_ru' => 'Главная',
                'name_ro' => 'Principala',
                'name_en' => 'Main',
                'icon'    => 'mdi-home-circle',
                'link'    => '',
            ],


        ];
    }

    public static function permissions(): array
    {
        return array_values(config('permissions.general.modules.menu_items.actions'));
    }
}
