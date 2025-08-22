<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyChain extends Model
{
    /** @use HasFactory<\Database\Factories\SupplyChainFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'department_id',
        'service_id'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
