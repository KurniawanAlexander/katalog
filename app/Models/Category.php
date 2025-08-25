<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // tambahkan kolom yang boleh mass assignment
    protected $fillable = [
        'name',
        'description',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
