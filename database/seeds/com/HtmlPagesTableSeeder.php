<?php
namespace seeds\com;

use Illuminate\Database\Seeder;

class HtmlPagesTableSeeder extends Seeder
{

    public function run(): void
    {
    }

    public static function permissions(): array
    {
        return array_values(config('permissions.general.modules.html_pages.actions'));
    }
}
