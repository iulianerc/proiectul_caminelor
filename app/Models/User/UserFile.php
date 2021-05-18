<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use LaravelMerax\FileServer\App\Contracts\Attachable;
use LaravelMerax\FileServer\App\Traits\HasFile;

class UserFile extends Model implements Attachable
{
    use HasFile;

    protected $fillable = ['user_id', 'file_type', 'confirmed_by'];

    protected bool $optimizeImages = true;

    protected string $folder = 'user_files';

    public function store(UploadedFile $file, $userId, $fileType)
    {
        return DB::transaction(function () use ($file, $userId, $fileType) {
            $this->delete();
            $userFile = self::create([
                'user_id'   => $userId,
                'file_type' => $fileType
            ]);

            return tap($userFile)->upload($file);
        });
    }

    public function changeStatus(string $status, User $user): void
    {
        $this->status = $status;
        $this->performed_by = $user->id;
        $this->save();
    }

    public static function checkConfirmed(Collection $userFiles, array $required): bool
    {
        $requiredDownloaded = $userFiles->whereIn('file_type', $required);

        return $requiredDownloaded->count() === count($required) &&
            $requiredDownloaded->every(fn($file) => $file->status === 'confirmed');

    }
}
