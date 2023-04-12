<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gala extends Model
{
    use HasFactory;
    protected $fillable = ['gala_name','start_date','end_date'];

    public function event(){
        return $this->hasMany(Event::class);
    }
}
