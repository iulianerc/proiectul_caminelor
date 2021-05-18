<?php

namespace App\Traits\Sort;

use _HumbugBox373c0874430e\Nette\Neon\Exception;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Trait StateFilter
 * Filter for state field.
 *
 * **To use it add scope filter in model's repository and set default value `0`**
 *
 * @package App\Traits\Sort
 */
trait StateFilter
{
    protected string $stateFieldName = 'is_active';

    public function scopeActive(QueryBuilder $query): QueryBuilder
    {
        return $query->where("{$this->getTable()}.{$this->stateFieldName}", 1);
    }

    public function scopeState(QueryBuilder $query): QueryBuilder
    {
        if (isset(request()->filter['state']) && (int)request()->filter['state'] === 1) {
            return $query;
        }

        return $query->where("{$this->getTable()}.{$this->stateFieldName}", 1);
    }

    public function setStateFieldName(string $stateFieldName): void
    {
        $this->stateFieldName = $stateFieldName;
    }

    public function toggleState(): self
    {
        $this->{$this->stateFieldName} = (int)!$this->{$this->stateFieldName};

        return $this;
    }

    public function setStateActive(): self
    {
        $this->{$this->stateFieldName} = 1;

        return $this;
    }

    public function setStateInactive(): self
    {
        $this->{$this->stateFieldName} = 0;

        return $this;
    }


    public function deleteWithSoft(): ?bool
    {
        if (!$this->is_active) {
            return $this->delete();
        }

        return $this->setStateInactive()->save();
    }

//    public function delete()
//    {
//        return $this->setStateInactive()->save();
//    }

    public function setIsActiveAttribute($value): void
    {
        $this->attributes[$this->stateFieldName] = $value === 'true' || $value === true ? 1 : 0;
    }
}
