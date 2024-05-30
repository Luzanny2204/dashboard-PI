<?php

namespace App\Models\Nutritionist;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nutritionist extends Model
{
    use HasFactory;
    protected $table = 'nutritionists';
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

