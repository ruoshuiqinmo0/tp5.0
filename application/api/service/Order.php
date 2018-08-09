<?php

namespace app\api\service;


use app\api\model\Product;

class Order
{
    protected $oProducts;

    protected $products;

    protected $uid;

    public function place($uid, $oProducts)
    {
        $this->oProducts = $oProducts;
        $this->products = $this->getProductByOrder($oProducts);
        $this->uid = $uid;
    }

    private function getOrderStatus()
    {
        $status = [
            'pass' => true,
            'orderPrice' => 0,
            'pStatus' =>[],
        ];
        foreach($this->oProducts as $oProduct){

        }
    }

    private function getProductStatus($oPid,$count,$products){
        $pIndex = -1;

        $pStatus = [

        ];
    }

    protected function getProductByOrder($oProducts)
    {
        $pid = [];
        foreach ($oProducts as $items) {
            array_push($pid, $items['product_id']);
        }
        $products = Product::all($pid)->visible(['id', 'price', 'stock', 'name', 'main_img_url'])->toArray();
        return $products;
    }
}