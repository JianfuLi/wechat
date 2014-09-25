<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-27 上午11:23
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server;

/**
 * Class EventType
 *
 * @package Gram\WeChat\Server
 */
class EventType
{
    /**
     * 定阅事件
     */
    const SUBSCRIBE = 'SUBSCRIBE';
    /**
     * 取消定阅事件
     */
    const UN_SUBSCRIBE = 'UNSUBSCRIBE';
    /**
     * 扫描带参数二维码
     */
    const SCAN = 'SCAN';
    /**
     * 上报地理位置事件
     */
    const LOCATION = 'LOCATION';
    /**
     * 点击菜单事件
     */
    const CLICK = 'CLICK';
    /**
     * 点击菜单跳转链接事件
     */
    const VIEW = 'VIEW';
} 