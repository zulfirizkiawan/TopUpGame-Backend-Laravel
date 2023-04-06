<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nominal extends Model
{
    use HasFactory;

    protected $fillable = [
        'coinName', 'amountCoin', 'coinPrice'
    ];

    public function game()
    {
        return $this->belongsTo(game::class);
    }
    

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdateAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
