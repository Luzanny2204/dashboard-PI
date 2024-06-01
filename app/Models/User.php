<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\DataBiology\Databiology;
use App\Models\MenstrualCalendar\Menstrualcalendar;
use App\Models\Nutritionist\nutritionist;
use App\Models\Physiotherapist\Physiotherapist;
use App\Models\Position\Position;
use App\Models\Psicology\Psicology;
use App\Models\State\State;
use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'weight',
        'height',
        'phone',
        'position_id',
        'state_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion directa 
    public function state(){
        //return $this->belongsTo('App\Models\State\State', 'state_id');
        return $this->belongsTo(State::class);
    }

    //Relacion directa 
    public function position(){
        return $this->belongsTo(Position::class);
    }


    /*Relacion de muchos a muchos belongsToMany */
    public function teams(){
        return $this->belongsToMany(Team::class,'users_has_teams');
    }

    //Relacion Inversa
    public function databiologies(){
        //return $this->hasMany('App\Models\User', 'state_id');
        return $this->hasMany(Databiology::class);
    }

    //Relacion Inversa
    public function menstrualcalendars(){
        //return $this->hasMany('App\Models\User', 'state_id');
        return $this->hasMany(Menstrualcalendar::class);
    }

    //Relacion Inversa
    public function nutritionists(){
        return $this->hasMany(nutritionist::class);
    }
    //Relacion Inversa
    public function psicologies(){
        return $this->hasMany(Psicology::class);
    }

    //Relacion Inversa
    public function teamsUsers(){
        return $this->hasMany(Psicology::class,'user_id');
    }

     //Relacion Inversa
     public function physiotherapists(){
        return $this->hasMany(Physiotherapist::class);
    }


}


