<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:36
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class ImageRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class ImageRequest extends BaseMessage
{
    /**
     * @var string
     */
    protected $picUrl;

    /**
     * @var string
     */
    protected $mediaId;

    /**
     * 图片链接
     *
     * @return string
     */
    public function getPicUrl()
    {
        return $this->picUrl;
    }

    /**
     * 图片消息媒体id，可以调用多媒体文件下载接口拉取数据。
     *
     * @return string
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }
} 