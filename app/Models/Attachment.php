<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /** @use HasFactory<\Database\Factories\AttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'attachable_id',
        'attachable_type',
        'user_id', // uploader
    ];

    public function attachable()
    {
        return $this->morphTo();
    }
}
