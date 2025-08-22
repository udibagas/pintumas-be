<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    /** @use HasFactory<\Database\Factories\AppFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'description',
        'icon',
        'department_id',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_apps');
    }
}
