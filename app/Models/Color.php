<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoTimeStamp;

class Color extends Model
{
    use AutoTimeStamp;
    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_color', 'color_id', 'item_id');
    }
}
