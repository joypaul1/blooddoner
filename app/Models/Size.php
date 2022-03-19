<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoTimeStamp;

class Size extends Model
{
    use AutoTimeStamp;
    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_size', 'size_id', 'item_id');
    }
}
