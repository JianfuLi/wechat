<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-27 上午11:28
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class MessageRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class BaseMessage extends BaseRequest
{
    /**
     * @var int
     */
    protected $msgId;

    /**
     * 消息id，64位整型
     *
     * @return int
     */
    function getMsgId()
    {
        return $this->msgId;
    }
} 