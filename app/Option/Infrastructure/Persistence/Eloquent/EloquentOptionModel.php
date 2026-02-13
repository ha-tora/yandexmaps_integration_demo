<?php

namespace App\Option\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentOptionModel extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'options';

    protected $fillable = [
        'key',
        'value',
        'title',
        'description',
        'validation_rules'
    ];
}