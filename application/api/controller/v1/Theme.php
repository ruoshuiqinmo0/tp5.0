<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;
use think\Controller;
use app\api\model\Theme as ThemeModel;

class Theme extends Controller
{
    /**
     *@url /theme?id=id1,id2
     *
     *
     */
    public  function getSimpleList($ids = ''){
        (new IDCollection())->goCheck();
        $ids = explode(',',$ids);
        $result = ThemeModel::with('headImg,topicImg')->select($ids);
        if(!$result){
            throw new ThemeException();
        }
        return $result ;
    }

    /**
     * @url /theme/:id
     * @param $id
     */
    public function getComplexOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if($theme->isEmpty()){
            throw new ThemeException();
        }
        return $theme;
    }
}
