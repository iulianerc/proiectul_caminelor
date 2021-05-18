<?php

namespace App\Builders\Schema\Components;

use App\Builders\Schema\Components\Base\Component;

class FileUploader extends Component
{
    protected string $component = 'file';
    protected array $props
        = [
            'maxFiles'     => 10,
            'maxFileSize'  => 3 * 1024 * 1024,
            'maxTotalSize' => 15 * 1024 * 1024,
            'multiSelect'  => false,
            'allowedTypes' => ["image/jpeg", "image/png", "text/plain"],
            'useClipboard' => true,
            'canDrop'      => true,
            'thumbWidth'   => 75,
            'thumbHeight'  => 100,
            'useTitle'     => true,
            'uploadURL'    => "/uploads/store",
            'privateFile' => true
        ];

    public static function create(string $name): self
    {
        return new self($name);
    }

    public function setUrl(string $url): self
    {
        $this->props["uploadURL"] = $url;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->props["uploadURL"];
    }

    public function setMaxFiles(int $maxFiles): self
    {
        $this->props['maxFiles'] = $maxFiles;

        return $this;
    }

    public function setMaxFileSize(int $size): self
    {
        $this->props['maxFileSize'] = $size * 1024;

        return $this;
    }

    public function setMaxTotalSize(int $size): self
    {
        $this->props['maxTotalSize'] = $size * 1024;

        return $this;
    }

    public function setCanMultiSelect(bool $multiSelect = true): self
    {
        $this->props['multiSelect'] = $multiSelect;

        return $this;
    }

    public function setCanUseClipboard(bool $useClipboard = true): self
    {
        $this->props['useClipboard'] = $useClipboard;

        return $this;
    }

    public function setCanDrop(bool $canDrop = true): self
    {
        $this->props['useClipboard'] = $canDrop;

        return $this;
    }

    public function setUseTitle(bool $useTitle = true): self
    {
        $this->props['useTitle'] = $useTitle;

        return $this;
    }

    public function setAutoUpload(bool $auto = true): self
    {
        $this->props['autoUpload'] = $auto;

        return $this;
    }

    public function setAllowedTypes(array $types): self
    {
        $this->props['allowedTypes'] = $types;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name'        => $this->name,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'props'       => $this->props,
            'component'   => $this->component,
        ];
    }
}
