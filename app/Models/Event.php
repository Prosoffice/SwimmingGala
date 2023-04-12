<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable= ['squad_id','distance','stroke_id','gala_id','swimmer_id','finish_time','event_type'];

    public function gala(): BelongsTo
    {
        return $this->belongsTo(Gala::class);
    }

    public function squad(){
        return $this->belongsTo(Squad::class);
    }
    public function stroke(){
        return $this->belongsTo(Stroke::class);
    }

    public function swimmer(){
        return $this->belongsTo(Swimmer::class);
    }

}
