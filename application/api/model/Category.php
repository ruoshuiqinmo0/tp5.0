<?php

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time'];

    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function product(){
        return $this->hasMany('Product','category_id','id');
    }
}
