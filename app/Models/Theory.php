<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theory extends Model
{
    use HasFactory;

    protected $table = 'theory';
    protected $fillable = ['image','title','description','topic_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class)->withDefault();
    }
}
