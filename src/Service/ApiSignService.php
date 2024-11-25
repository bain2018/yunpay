<?php
namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\AttributeSetGetTrait;
use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataHandleTrait;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;
use WGCYunPay\Exception\YunPayException;

/**
 * h5签约相关接口封装.
 * Class H5SignService.
 * @package WGCYunPay\Service
 * @method $this setRealName($real_name)
 * @method $this setIdCard($id_card)
 * @method $this setCardType($card_type)
 * @method $this setToken($token)
 * @method $this setColor($color)
 * @method $this setUrl($url)
 * @method $this setRedirectUrl($redirect_url)
 */
class ApiSignService extends BaseService
{
    /**
     * 获取协议预览 URL
     */
    const CONTRACT_SIGN = 'sign_contract';

    /**
     * 签约接口
     */
    const API_SIGN = 'sign_api';

    /**
     *  获取用户签约状态
     */
    const SIGN_STATUS = 'sign_status';

    /**
     * 对接测试解约接口
     */
    const TEST_RESCIND = 'sign_release';

    /**
     * 请求类型
     */
    const  METHOD_ARR = [self::CONTRACT_SIGN, self::API_SIGN, self::SIGN_STATUS, self::TEST_RESCIND];

    /**
     * 身份证姓名
     */
    protected $real_name;

    /**
     * 身份证号码
     */
    protected $id_card;

    /**
     * 证件类型
     * idcard：身份证 mtphkm：港澳居民来往内地通行证 passport：护照 mtpt：台湾居民来往大陆通行证
     */
    protected $card_type;





    use MethodTypeTrait;

    use AttributeSetGetTrait;

    use DataHandleTrait;

    /**
     * @throws YunPayException
     */
    protected function getDes3Data(): array
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        switch ($this->methodType ?? self::CONTRACT_SIGN) {
            case self::CONTRACT_SIGN:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id,];
                break;
            case self::SIGN_STATUS:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id, 'real_name' => $this->real_name, 'id_card' => $this->id_card];
                break;
            case self::API_SIGN:
            case self::TEST_RESCIND:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id,
                    'real_name' => $this->real_name, 'id_card' => $this->id_card, 'card_type' => $this->card_type];
                break;
            default:
                YunPayException::throwSelf('not des3Data');
        }
        return $data;
    }

    protected function getRequestInfo(): array
    {
        // TODO: Implement getRequestInfo() method.
        $methodType = $this->methodType ?? self::CONTRACT_SIGN;
        $method     = 'get';
        if (in_array($methodType, [self::CONTRACT_SIGN, self::TEST_RESCIND,self::API_SIGN])) {
            $method = 'post';
        }
        switch ($methodType) {
            case self::CONTRACT_SIGN:
                $route = Router::CONTRACT_SIGN;
                break;
            case self::API_SIGN:
                $route = Router::API_SIGN;
                break;
            case self::SIGN_STATUS:
                $route = Router::API_SIGN_STATUS;
                break;
            case self::TEST_RESCIND:
                $route = Router::API_TEST_RESCIND;
                break;
            default:
                $route = Router::CONTRACT_SIGN;
        }
        return [$route, $method];
    }
}