<?php

namespace App\Models\DataBiology;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databiology extends Model
{
    use HasFactory;

    protected $table = 'databiologies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'waist',
        'quadril',
        'bust',
        'endurance',
        'speed',
        'flexibility',
        'temperature',
        'imc',
        'user_id',
    ];  

    //Relacion directa 
    public function user(){
        return $this->belongsTo(User::class);
    }

}
