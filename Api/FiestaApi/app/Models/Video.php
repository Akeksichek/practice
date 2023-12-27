<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table="videos";
    protected $fillable=['id_video','name','preview','video','desc','user_id'];

    protected $primaryKey = 'id_video';


}



