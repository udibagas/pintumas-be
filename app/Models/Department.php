<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

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

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function regulations()
    {
        return $this->hasMany(Regulation::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function supplyChains()
    {
        return $this->hasMany(SupplyChain::class);
    }

    public function apps()
    {
        return $this->belongsToMany(App::class, 'department_apps');
    }
}
