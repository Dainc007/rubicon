<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    static public const AVAILABLE_FILES = [
        'csv', 'json', 'ldil',
    ];

    static public const AVAILABLE_STATUSES = [
        'single', 'divorced', 'merried',
    ];

    protected $fillable = [
        'customer',
        'country',
        'order',
        'status',
        'group',
        'file',
    ];
}
