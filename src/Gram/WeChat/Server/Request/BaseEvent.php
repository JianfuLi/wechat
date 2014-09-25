<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-27 下午2:10
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class BaseEvent
 *
 * @package Gram\WeChat\Server\Request
 */
abstract class BaseEvent extends BaseRequest
{
    /**
     * @var string
     */
    protected $event;

    /**
     * 事件类型
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }
} 