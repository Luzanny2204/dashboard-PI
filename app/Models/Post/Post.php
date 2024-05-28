<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];   

    //Relacion Inversa
    public function users(){
        return $this->hasMany(User::class);
    }
}
