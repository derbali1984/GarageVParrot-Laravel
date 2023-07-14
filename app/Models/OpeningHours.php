<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHours extends Model
{
    use HasFactory;
    protected $fillable = ['day_id', 'time'];

    public $timestamps = false;

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
