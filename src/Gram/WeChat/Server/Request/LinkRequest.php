<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:43
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class LinkRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class LinkRequest extends BaseMessage
{
    protected $title;
    protected $description;
    protected $url;

    /**
     * 消息描述
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * 消息标题
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 消息链接
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}