<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 上午11:58
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Response;

/**
 * Class Article
 *
 * @package Gram\WeChat\Server\Response
 */
class Article
{
    /**
     * 图文消息标题
     * @var string
     */
    public $title;

    /**
     * 图文消息描述
     * @var string
     */
    public $description;

    /**
     * 图片链接，支持JPG、PNG格式，较好的效果为大图360*200，小图200*200
     *
     * @var string
     */
    public $picUrl;

    /**
     * 点击图文消息跳转链接
     * @var string
     */
    public $url;

    /**
     * @param string $title
     * @param string $description
     * @param string $picUrl
     * @param string $url
     */
    function __construct($title = null, $description = null, $picUrl = null, $url = null)
    {
        if (!empty($title)) {
            $this->title = $title;
        }
        if (!empty($description)) {
            $this->description = $description;
        }
        if (!empty($picUrl)) {
            $this->picUrl = $picUrl;
        }
        if (!empty($url)) {
            $this->url = $url;
        }
    }
}