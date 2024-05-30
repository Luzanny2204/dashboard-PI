<?php

namespace App\Models\Psicology;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicology extends Model
{
    use HasFactory;
    protected $table = 'psicologies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'description',
        'user_id'
    ]; 
    
    
        //Relacion directa 
        public function user(){
            return $this->belongsTo(User::class);
        }

        
}
