<?php


namespace App\Http\Resources\HtmlPage;


use App\Http\Resources\BaseResource;

class HtmlPageResource extends BaseResource
{

    protected function fields(): array
    {

        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'alias'        => $this->alias,
            'publish_date' => \carbon($this->publish_date)->format('d.m.Y'),
            'author_name'  => $this->author_name,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            '_actions'     => $this->_actions
        ];
    }
}
