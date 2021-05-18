<?php


namespace App\Traits\Permission;


use App\Services\Permission\PermissionService;
use Illuminate\Support\Str;

trait BasicRules
{
    private function createRuleName($permissionName): string
    {
        self::$accessLevels[$permissionName] ??= PermissionService::getAccessLevel($permissionName);
        $ruleName = 'rule' . Str::ucfirst(self::$accessLevels[$permissionName]);

        return Str::camel($ruleName);
    }

    private function ruleAll(): bool
    {
        return true;
    }

    private function ruleProject(): bool
    {
        return $this->project_id === user()->project_id;
    }

    private function ruleOwn(): bool
    {
        return $this->author_id === \user()->id;
    }
}
