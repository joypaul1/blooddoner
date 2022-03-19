<?php

namespace App\Models;

use App\Traits\AutoDeleteFile;
use App\Traits\AutoTimeStamp;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use AutoTimeStamp, Sluggable, AutoDeleteFile;

    protected $guarded = ['id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id','id');
    }

    public function child_category()
    {
        return $this->belongsTo(ChildCategory::class, 'childcategory_id','id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'item_color', 'item_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'item_size', 'item_id', 'size_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    private static function autoDeleteFileConfig()
    {
        return [
            'disk' => 'simpleupload',
            'attribute' => 'feature_image'
        ];
    }
}
