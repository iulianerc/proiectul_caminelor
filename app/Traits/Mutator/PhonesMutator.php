<?php


namespace App\Traits\Mutator;

/**
 * Trait Phones
 *  - **On save** transforms an array of phones in comma separated string
 * @property array $attributes
 */
trait PhonesMutator
{
    /**
     * Mutator for phones number
     * @param string|array $value
     */
    public function setPhonesAttribute($value): void
    {
        if (is_array($value)) {
            $value = implode(',', $value);
        }

        $this->attributes['phones'] = $value;
    }
}
