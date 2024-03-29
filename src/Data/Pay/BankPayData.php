<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | user : 放下
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2019/7/31 10:51
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Pay;

use WGCYunPay\Data\Pay\BaseData;
use WGCYunPay\Data\Router;

class BankPayData extends BaseData
{
    /**
     * 银⾏开户卡号(必填)
     * @var
     */
    public $card_no;

    /**
     * ⽤户或联系⼈⼿机号(选填)
     * @var
     */
    public $phone_no;

    /**
     * 收款⼈id(选填)
     * @deprecated
     * @var
     */
    public $anchor_id;

    protected $route = Router::BANK_CARD;
}
