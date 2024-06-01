<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State\State;
use App\Models\User;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'state_id',
        'user_id'
    ]; 
    
    
    //Relacion directa 
    public function state(){
        return $this->belongsTo(State::class);
    }

    public function userTeam(){
        return $this->belongsTo(User::class,'user_id');
    }

     /*Relacion de muchos a muchos*/
     public function users(){
        return $this->belongsToMany(User::class,'users_has_teams');
    }

}
