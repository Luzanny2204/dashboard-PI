<?php

namespace App\Models\Position;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State\State;
use App\Models\User;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'state_id',
    ];  
    
     //Relacion directa  belongsTo
     public function state(){
        //return $this->belongsTo('App\Models\State\State', 'state_id');
        return $this->belongsTo(State::class);
    }

     //Relacion Inversa hasMany
     public function users(){
        return $this->hasMany(User::class);
    }
}
