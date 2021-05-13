<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public const AVAILABLE_FILES = [
        'csv', 'json', 'ldil',
    ];

    public const AVAILABLE_STATUSES = [
        'single', 'divorced', 'married', 'common-law',
    ];

    public const CSV = 'csv';
    public const JSON = 'json';
    public const LDIF = 'ldif';

    protected $fillable = [
        'customer',
        'country',
        'order',
        'status',
        'group',
        'file',
    ];
}
