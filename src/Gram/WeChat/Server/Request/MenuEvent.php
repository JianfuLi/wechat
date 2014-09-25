<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-27 下午1:14
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class MenuEvent
 *
 * @package Gram\WeChat\Server\Request
 */
class MenuEvent extends BaseEvent
{
    /**
     * 事件KEY值
     *
     * @var string
     */
    protected $eventKey;

    /**
     * 事件KEY值
     *
     * @return string
     */
    public function getEventKey()
    {
        return $this->eventKey;
    }
}