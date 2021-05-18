<?php


namespace App\Traits\Mutator;


use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait AuthorId
{
    public static function bootAuthorId(): void
    {
        self::creating(fn ($model) => $model->setAuthorId());
    }

    private function setAuthorId(): void
    {
        $this->author_id = user()->id ?? 1;
    }

    public function getAuthorNameAttribute($value): string
    {
        return $this->author->name ?? '';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
