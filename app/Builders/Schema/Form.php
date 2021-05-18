<?php


namespace App\Builders\Schema;


use App\Builders\Schema\Layouts\Layout;
use Illuminate\Support\Collection;
use Merax\Helpers\Helper;

abstract class Form
{
    use Rules;
    private Schema $schema;
    private DataObject $dataObject;

    public function __construct()
    {
        $module = Helper::getModuleName();
        $moduleTranslation = __("modules/{$module}");
        $this->schema = new Schema(
            $moduleTranslation['title'] ?? '',
            $moduleTranslation['description'] ?? ''
        );
        $this->dataObject = new DataObject();
        $this->rules = collect();

        $this->schema->setComponents(...$this->components());

        $this->rules();

        $layout = $this->layout($this->schema->componentKeys());
        $this->schema->setLayout($layout);
    }

    public function schema(): Schema
    {
        return $this->schema;
    }

    public function dataObject(): DataObject
    {
        return $this->dataObject;
    }

    public function build(): array
    {
        return [
            'schema'     => $this->schema->get()->all(),
            'dataObject' => $this->dataObject->get()->all()
        ];
    }

    protected function layout(Collection $fields): ?Layout
    {
        return null;
    }

    abstract protected function components(): array;

    abstract protected function rules(): void;
}
