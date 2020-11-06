<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

	protected $table = "tweets";
	
    protected $fillable = [ 
        'user_id', 'tweet',
    ];
}
