<?php

namespace App\Traits\Icons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LaravelMerax\FileServer\App\Traits\HasFile;

/**
 * Trait HasIcon
 * @package App\Traits\Icons
 */
trait HasIcon
{
    /**
     * @param HasFile|Model $model
     */
    public function deleteIcon($model): void
    {
        $path = $model->file ? "{$model->folder()}/{$model->file->saved_name}" : '';
        Storage::delete($path);

        $model->file()->delete();
    }

    /**
     *
     * @param $icon
     * @param HasFile|Model $model
     */
    public function storeIcon($icon, $model): void
    {
        if (!$icon instanceof UploadedFile) {
            return;
        }
        $model->upload($icon);
    }

    /**
     * @param $icon
     * @param HasFile|Model $model
     */
    public function updateIcon($icon, $model): void
    {
        if (!empty($icon)) {
            $this->deleteIcon($model);
        }
        $this->storeIcon($icon, $model);
    }
}
