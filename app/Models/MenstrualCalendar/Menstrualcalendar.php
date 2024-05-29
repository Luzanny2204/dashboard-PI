<?php

namespace App\Models\MenstrualCalendar;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menstrualcalendar extends Model
{
    use HasFactory;

    protected $table = 'menstrualcalendars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'last_period',
        'duration',
        'symptoms',
        'cervical_flux',
        'sexual_activity',
        'user_id',
    ];  

     //Relacion directa 
     public function user(){
        return $this->belongsTo(User::class);
    }
}
