<?php

namespace App\Traits\FileServer;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RuntimeException;
use LaravelMerax\FileServer\App\Models\File;

/**
 * Trait FileManager
 *
 * @property File $file
 * @property null|string $path
 */
trait FileManager
{
    public function getPathAttribute($value): ?string
    {
        if ($this->file === null) {
            return null;
        }

        return "{$this->folder()}/{$this->file->saved_name}";
    }

    public function updateFile(array $attributes): void
    {
        if (
            !empty($attributes['file_name']) ||
            !$this->fileWasChanged($attributes['uploaded_file'] ?? null)
        ) {
            return;
        }

        try {
            $this->saveFile($attributes);
            $this->deleteFile();
        } catch (Exception $exception) {
            throw new RuntimeException($exception->getMessage());
        }
    }

    public function fileWasChanged(?UploadedFile $uploadedFile): bool
    {
        if (!isset($this->file, $uploadedFile)) {
            return true;
        }

        $uploadedFileHash = md5($uploadedFile->getContent());
        $localFileHash = md5(Storage::get($this->path));

        return $uploadedFileHash != $localFileHash;
    }

    public function deleteFile(): void
    {
        if ($this->file === null) {
            return;
        }

        Storage::delete($this->path);
        $this->file->delete();
    }

    public function saveFile($file): void
    {
        if ($file === null) {
            return;
        }

        $this->upload($file);
    }
}
