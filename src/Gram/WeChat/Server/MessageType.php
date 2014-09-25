<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:12
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server;

/**
 * Class MessageType
 *
 * @package Gram\WeChat\Server
 */
class MessageType
{
    /**
     * 图文消息，仅在回复时使用
     */
    const NEWS = 'NEWS';
    /**
     * 文本消息
     */
    const TEXT = 'TEXT';
    /**
     * 图片消息
     */
    const IMAGE = 'IMAGE';
    /**
     * 语音消息
     */
    const VOICE = 'VOICE';
    /**
     * 视频消息
     */
    const VIDEO = 'VIDEO';
    /**
     * 链接消息
     */
    const LINK = 'LINK';
    /**
     * 音乐消息，仅在回复时使用
     */
    const MUSIC = 'MUSIC';
    /**
     * 位置消息
     */
    const LOCATION = 'LOCATION';
    /**
     * 事件消息
     */
    const EVENT = 'EVENT';
}