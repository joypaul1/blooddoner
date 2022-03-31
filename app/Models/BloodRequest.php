<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $guarded = [];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function postcode()
    {
        return $this->belongsTo(PostCode::class, 'postcode_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function blood()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_id', 'id');
    }
}
