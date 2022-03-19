<?php

namespace App\Traits;

use App\Models\ChildCategory;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Utils\Util;
use PhpParser\Node\Stmt\Static_;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::saving(function ($model) {
            $separator = '-';
            if (get_class($model) == SubCategory::class) {
                $model->slug = Util::slug($model->category->name.$separator.$model->name);
            }
            else if(get_class($model) == ChildCategory::class){
                $model->slug = Util::slug($model->category->name.$separator.$model->sub_category->name.$model->name);
            }
            else if (get_class($model) == Item::class) {
                $model->slug = Util::slug($model->name . $separator.$model->brand_id.$model->category->name.$model->sub_category->name.$model->child_category->name);
            } else if ($model->name) {
                $model->slug = Util::slug($model->name);
            }
        });
    }

}
