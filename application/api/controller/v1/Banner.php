<?php
namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;

class Banner extends BaseController
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
        if (!$banner ) {
            throw new MissException([
                'msg' => '请求banner不存在',
                'errorCode' => 40000
            ]);
        }
        //dump($banner);
       return $banner;
    }
}
?>