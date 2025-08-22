<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    /** @use HasFactory<\Database\Factories\RegulationFactory> */
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
        'description',
        'effective_date',
        'expiration_date',
        'status',
        'department_id',
        'user_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_regulations');
    }
}
