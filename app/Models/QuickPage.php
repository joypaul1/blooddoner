<?php

namespace App\Models;
use App\Traits\AutoTimeStamp;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class QuickPage extends Model
{
	use AutoTimeStamp, Sluggable;
	
    protected $guarded = ['id'];
    protected $fillable = [
        'name','short_desc','slug',
    ];
}
