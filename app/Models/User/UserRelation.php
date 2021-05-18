<?php


namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    protected $fillable = ['user_id', 'parent_id'];
    public $timestamps = false;
}
