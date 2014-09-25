<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-27 上午11:56
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class Subscribe
 *
 * @package Gram\WeChat\Server\Request
 */
class SubscribeEvent extends MenuEvent
{
    /**
     * @var string
     */
    protected $ticket;

    /**
     * 二维码的ticket，可用来换取二维码图片
     *
     * @return string
     */
    public function getTicket()
    {
        return $this->ticket;
    }
} 