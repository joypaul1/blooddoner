<?php

namespace App\Models;

use App\Traits\AutoDeleteFile;
use App\Traits\AutoTimeStamp;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use AutoTimeStamp, Sluggable, AutoDeleteFile;

    protected $guarded = ['id'];

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function child_categories()
    {
        return $this->hasMany(ChildCategory::class);
    }

    private static function autoDeleteFileConfig()
    {
        return [
            'disk' => 'simpleupload',
            'attribute' => 'image'
        ];
    }
}
