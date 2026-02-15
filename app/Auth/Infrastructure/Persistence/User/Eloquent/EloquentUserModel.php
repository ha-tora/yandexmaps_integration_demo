<?php

namespace App\Auth\Infrastructure\Persistence\User\Eloquent;

use App\Auth\Infrastructure\Persistence\Token\Eloquent\EloquentTokenModel;
use Illuminate\Foundation\Auth\User;

class EloquentUserModel extends User
{
    public $incrementing = false;

    protected $table = 'users';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password'
    ];
}