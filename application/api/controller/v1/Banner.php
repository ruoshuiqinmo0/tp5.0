<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 16:52
 */

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;

class Banner
{

    /**
     * @url /banner/:id
     * @http Get
     * @id banner_id
     */
    public function getBanner($id)
    {
        (new IDMustBePostiveInt())->goCheck($id);
        $banner = BannerModel::getBannerByID($id);
        if ($banner->isEmpty()) {
            throw new BannerMissException();
        }
        return $banner;
    }
}