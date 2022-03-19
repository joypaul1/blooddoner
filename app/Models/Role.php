<?php

namespace App\Models;

use App\Traits\AutoTimeStamp;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use AutoTimeStamp;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
