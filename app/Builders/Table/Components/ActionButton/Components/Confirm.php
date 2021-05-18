<?php


namespace App\Builders\Table\Components\ActionButton\Components;


class Confirm
{
    protected string $mode;
    protected string $text;
    protected string $title;
    protected string $btnConfirmLabel;
    protected string $btnCancelLabel;

    public function __construct(
        string $text,
        string $mode = null,
        string $title = null,
        string $btnConfirmLabel = null,
        string $btnCancelLabel = null
    ) {
        $this->text = $text;
        $this->mode = $mode ?? 'quick';
        $this->title = $title ?? (string)__('global/crud.confirm');
        $this->btnConfirmLabel = $btnConfirmLabel ?? (string)__('global/crud.confirm');
        $this->btnCancelLabel = $btnCancelLabel ?? (string)__('global/crud.cancel');
    }

    public function toArray(): array
    {
        return [
            'mode'            => $this->mode,
            'text'            => $this->text,
            'title'           => $this->title,
            'btnConfirmLabel' => $this->btnConfirmLabel,
            'btnCancelLabel'  => $this->btnCancelLabel,

        ];
    }
}
