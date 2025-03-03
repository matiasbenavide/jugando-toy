<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const INDIVIDUAL = 1;
    const COMBO = 2;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];
}
