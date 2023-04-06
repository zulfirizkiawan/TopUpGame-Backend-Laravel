<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class game extends Model
{
    use HasFactory;

    protected $fillable = [
        'gameName',
        'category',
        'nominal_id',
        'status',
        'gamePhotoPath'
    ];

    public function nominal()
    {
        return $this->hasMany(nominal::class, 'coinName', 'nominal_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdateAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['gamePhotoPath'] = $this->gamePhotoPath;
        return $toArray;
    }

    public function getGamePhotoPathAttribute()
    {
        return url('') . Storage::url($this->attributes['gamePhotoPath']);
    }
}
