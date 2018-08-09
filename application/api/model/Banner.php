<?php
namespace app\api\model;


use app\lib\exception\BannerMissException;

class Banner extends BaseModel
{
    //protected $table = 'category';//含表前缀
//    protect ed $name  = 'banner';//不含表前缀
    protected $hidden = ['update_time', 'delete_time'];

    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerByID($id)
    {
        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;
    }

}