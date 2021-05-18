<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AccountActivate extends Model
{
    protected $fillable = ['email', 'token'];
}
