<?php

namespace App\Models\Physiotherapist;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physiotherapist extends Model
{
    use HasFactory;

    protected $table = 'physiotherapists';
    protected $primaryKey = 'id';
    protected $fillable = [
        'consultation_date',
        'description',
        'user_id',
    ];  

    //Relacion directa 
    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
