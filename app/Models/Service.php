<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function supplyChains()
    {
        return $this->hasMany(SupplyChain::class);
    }

    public function regulations()
    {
        return $this->belongsToMany(Regulation::class, 'service_regulations');
    }
}
