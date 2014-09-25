<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:40
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class VideoRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class VideoRequest extends BaseMessage
{
    /**
     * @var string
     */
    protected $mediaId;
    /**
     * @var string
     */
    protected $thumbMediaId;

    /**
     * 视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
     *
     * @return string
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * 视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。
     *
     * @return string
     */
    public function getThumbMediaId()
    {
        return $this->thumbMediaId;
    }


}