<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizes';
    protected $fillable = ['title','topic_id','isActive'];


    public function topic()
    {
        return $this->belongsTo(Topic::class)->withDefault();
    }
}
