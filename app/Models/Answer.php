<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'studentAnswers';
    protected $fillable = ['question_id','choosed_option','choosed_option_points'];
}
