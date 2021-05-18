<?php

namespace App\Http\Requests;


interface BasicRequestInterface
{

    public function rules(): array;

    public function ignore(): void;

}
