<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuimage extends Model
{
    /** @use HasFactory<\Database\Factories\MenuimageFactory> */
    use HasFactory;

    protected $table = 'menuimages';

    protected $guarded = ['id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
