<?php

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time', 'create_time', 'pivot', 'from', 'category_id', 'main_img_id'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->preImgUrl($value, $data);
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    public static function getMostRecent($size)
    {
        $product = self::limit($size)->order('create_time DESC')->select();
        return $product;
    }

    public static function getProductsByCategoryID($categoryId)
    {
        return self::where('category_id', $categoryId)->select();
    }

    public static function getProductDetail($id)
    {
        $product = self::with([
            'imgs' =>function($query){
                $query->with(['imgUrl'])->order('order ASC');
            }
        ])->with(['properties'])->find($id);
        return $product;
    }
}
