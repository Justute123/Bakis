<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = ['question_text','quiz_id','type','order','hint'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class)->withDefault();
    }
}
