<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'logo',
        'phone',
        'email',
        'address',
        'facebook',
        'x',
        'instagram',
        'youtube',
        'linkedin',
    ];
}
