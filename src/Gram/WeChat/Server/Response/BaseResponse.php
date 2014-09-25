<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 上午11:55
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Response;

/**
 * Class BaseResponse
 *
 * @package Gram\WeChat\Server\Response
 */
abstract class BaseResponse
{
    /**
     * @var string
     */
    public $toUserName = '';

    /**
     * @var string
     */
    public $fromUserName = '';

    /**
     * @var int
     */
    public $createTime = 0;

    /**
     * @var string
     */
    public $msgType = '';

    function __construct($toUserName, $fromUserName, $msgType)
    {
        $this->toUserName = $toUserName;
        $this->fromUserName = $fromUserName;
        $this->msgType = $msgType;
        $this->createTime = time();
    }

    /**
     * 转换成Xml
     *
     * @return string
     */
    abstract function toXml();
}