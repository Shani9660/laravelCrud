<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'stored_name',
        'folder_name',
        'attachmentable_type',
    ];


    public function attachmentable()
    {
        return $this->morphTo();
    }
}

