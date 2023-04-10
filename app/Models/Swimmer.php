<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Swimmer extends Model
{
    use HasFactory;
    protected $fillable=['user_id','squad_id'];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function trainingData(): HasMany
    {
        return $this->hasMany(Event::class)->where('event_type', 'Training');
    }

    public function officialData(): HasMany
    {
        return $this->hasMany(Event::class)->where('event_type', 'Official');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(){
        return $this->belongsTo(User::class,'parent_id','id');
    }
}
