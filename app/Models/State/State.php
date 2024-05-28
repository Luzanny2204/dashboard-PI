<?php

namespace App\Models\State;

use App\Models\Position\Position;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];  

    //Relacion Inversa
    public function users(){
        //return $this->hasMany('App\Models\User', 'state_id');
        return $this->hasMany(User::class);
    }

    //Relacion Inversa
    public function positions(){
        return $this->hasMany(Position::class);
    }

    //Relacion Inversa
    public function teams(){
        return $this->hasMany(Team::class);
    }

}
