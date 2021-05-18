<?php


namespace App\Http\Resources\MenuItem;


use App\Http\Resources\BaseResource;

class MenuItemResource extends BaseResource
{

    protected function fields(): array
    {
        return [
            'id'          => $this->id,
            'name_ru'     => $this->name_ru,
            'name_ro'     => $this->name_ro,
            'name_en'     => $this->name_en,
            'link'        => $this->link,
            'icon'        => [
                'append_icon'  => $this->icon,
            ],
            'author_name' => $this->author_name,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            '_actions'    => $this->_actions,
        ];
    }
}
