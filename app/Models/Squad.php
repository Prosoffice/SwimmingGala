<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Squad extends Model
{
    use HasFactory;

    public function swimmers(): HasMany
    {
        return $this->hasMany(Swimmer::class);
    }

    public function clubTrainingData(): HasMany
    {
        return $this->HasMany(Event::class);
    }
}
