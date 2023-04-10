<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Squad extends Model
{
    use HasFactory;
    protected $fillable = ['name','coach_id'];
    

    public function swimmers(): HasMany
    {
        return $this->hasMany(Swimmer::class);
    }

    public function clubTrainingData(): HasMany
    {
        return $this->HasMany(Event::class);
    }
    public function coach(){
        return $this->belongsTo(User::class,'coach_id','id');
    }
}
