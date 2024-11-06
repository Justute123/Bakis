<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloom extends Model
{
    protected $table = 'bloomCategories';
    protected $fillable = ['title'];

}
