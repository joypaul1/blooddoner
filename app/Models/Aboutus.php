<?php

use App\Traits\AutoTimeStamp;
use App\Traits\Sluggable;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    // use AutoTimeStamp, Sluggable;
    
    protected $guarded = ['id'];
    protected $fillable = [
        'description',
    ];
}
