<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-21 下午5:57
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server;

use Gram\WeChat\Server\Request\BaseEvent;
use Gram\WeChat\Server\Request\BaseMessage;
use Gram\WeChat\Server\Request\BaseRequest;
use Gram\WeChat\Server\Request\RequestFactory;
use Gram\WeChat\Server\Response\BaseResponse;

/**
 * Class Route
 *
 * @package Gram\WeChat\Server
 */
class Route
{
    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * @var string
     */
    protected $token;

    /**
     * @param string $token
     */
    function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * 绑定消息监听函数
     *
     * @param string   $messageType 只能为MessageType提供的参数
     * @param callable $handler     回调函数
     *
     * @return $this
     */
    function message($messageType, \Closure $handler)
    {
        $messageType = strtoupper($messageType);
        $this->listeners[$messageType] = $handler;
        return $this;
    }

    /**
     * 绑定事件监听函数
     *
     * @param string   $eventType 只能为EventType提供的参数
     * @param callable $handler   回调函数
     */
    function event($eventType, \Closure $handler)
    {
        $eventType = strtoupper($eventType);
        if (!isset($this->listeners[MessageType::EVENT])) {
            $this->listeners[MessageType::EVENT] = array();
        }
        $this->listeners[MessageType::EVENT][$eventType] = $handler;
    }

    /**
     * 获取所有的事件监听器
     *
     * @return array
     */
    function getListeners()
    {
        return $this->listeners;
    }

    /**
     * 执行路由
     */
    function run()
    {
        try {
            $sign = new Signature($this->token);
            if (!$sign->verify()) {
                throw new \InvalidArgumentException('参数验证错误');
            }
            if (isset($_GET['echostr'])) {
                $this->echoStr();
            } else {
                $request = $this->prepareRequest();
                $response = $this->invokeRequest($request);
                $this->echoXml($response);
            }
        } catch (\Exception $ex) {
            $this->echoError($ex);
        }
    }


    /**
     * 准备请求参数
     * @return Request\ImageRequest|Request\LinkRequest|Request\LocationRequest|Request\TextRequest|Request\VideoRequest|Request\VoiceRequest
     */
    protected function prepareRequest()
    {
        $xml = file_get_contents('php://input');
        $data = simplexml_load_string($xml);
        $input = array();
        foreach ($data as $k => $v) {
            $input[$k] = strval($v);
        }
        return RequestFactory::create($input);
    }

    /**
     * 响应客户端请求
     *
     * @param BaseRequest $param
     *
     * @return BaseResponse|null
     */
    protected function invokeRequest(BaseRequest $param)
    {
        $msgType = strtoupper($param->getMsgType());
        if (!isset($this->listeners[$msgType])) {
            return null;
        }
        if ($param instanceof BaseMessage) {
            return call_user_func($this->listeners[$msgType], $param);
        }
        if ($param instanceof BaseEvent) {
            $event = strtoupper($param->getEvent());
            if (isset($this->listeners[$msgType][$event])) {
                return call_user_func($this->listeners[$msgType][$event], $param);
            }
        }
        return null;
    }

    /**
     * 执行参数合法性验证
     */
    protected function echoStr()
    {
        echo isset($_GET['echostr']) ? $_GET['echostr'] : '';
    }

    protected function echoError(\Exception $ex)
    {
        echo $ex->getMessage();
    }

    /**
     * 按XML格式打印结果
     *
     * @param $response
     */
    protected function echoXml($response)
    {
        header("Content-type: application/xml; charset=utf-8");
        if (is_null($response)) {
            echo 'null';
        } elseif ($response instanceof BaseResponse) {
            echo $response->toXml();
        } else {
            echo strval($response);
        }
    }
} 