<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Quiz;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = ['quiz_id','user_id','total','corect_answers','wrong_answers'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class)->withDefault();;
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();;
    }

}
