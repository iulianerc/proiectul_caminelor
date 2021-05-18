<?php


namespace App\Templates\HtmlPage;


use App\Builders\Schema\Components\DatePicker;
use App\Builders\Schema\Components\HtmlEditor;
use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Form;
use App\Builders\Schema\Layouts\Layout;
use App\Builders\Schema\Layouts\Samples\NamedAreasLayout;
use App\Http\Requests\HtmlPage\HtmlPageRequest;
use Illuminate\Support\Collection;

class HtmlPageForm extends Form
{
    protected function components(): array
    {
        return [
            Input::create('name'),
            Input::create('alias'),
            HtmlEditor::create('content')
                ->setProp('grid_area', 'content'),
            DatePicker::create('publish_date')
        ];
    }

    protected function rules(): void
    {
        $this->setRulesFromRequest(HtmlPageRequest::class);
    }

    protected function layout(Collection $fields): ?Layout
    {
        return NamedAreasLayout::create()
            ->setButtonsStyle('bottom', 'center')
            ->put('xs', 'repeat(1, 1fr)', [
                ['name'],
                ['alias'],
                ['content'],
                ['publish_date'],
            ]);
    }
}
