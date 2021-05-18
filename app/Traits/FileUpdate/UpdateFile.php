<?php

namespace App\Traits\FileUpdate;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

/**
 * Trait HasIcon
 * @package App\Traits\Icons
 */
trait UpdateFile
{
    public function updateFile ($orderGuarantee, $uploadedFile = null, $wasChanged = false): JsonResponse
    {
        if ($wasChanged) {
            return created();
        }

        $path = $orderGuarantee->folder() . '/' . optional($orderGuarantee->file)->saved_name;
        if ($uploadedFile) {
            if (!$orderGuarantee->file) {
                $orderGuarantee->upload($uploadedFile);

                return created();
            }

            if ($this->areDifferent(
                Storage::get($path),
                $uploadedFile
            )) {
                Storage::delete($path);
                $orderGuarantee->file->delete();
                $orderGuarantee->upload($uploadedFile);

                return created();
            }

            return created();
        }

        Storage::delete($path);
        optional($orderGuarantee->file)->delete();

        return destroyed();
    }

    public function areDifferent ($localFile, $uploadedFile): bool
    {
        $uploadedFileHash = md5($uploadedFile->getContent());
        $localFileHash = md5($localFile);

        return $uploadedFileHash != $localFileHash;
    }
}
