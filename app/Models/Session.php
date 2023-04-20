<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
Use App\Models\User;

class Session extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'id'            => 'string',
        'last_activity' => 'datetime',
    ];


    public function scopeOrdered($query)
    {
        return $query->orderBy('last_activity');
    }

    public function getLastActivityAtAttribute()
    {
        return Carbon::createFromTimestamp($this->last_activity);
    }

}
