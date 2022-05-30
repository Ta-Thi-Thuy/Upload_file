<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'name',
        'ext',
        'size',
        'path'
    ];
    use HasFactory;

    public $timestamps = true;
}
