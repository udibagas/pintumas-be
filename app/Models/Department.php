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

    public function apps()
    {
        return $this->hasMany(App::class);
    }

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
}
