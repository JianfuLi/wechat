<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:37
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class VoiceRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class VoiceRequest extends BaseMessage
{
    /**
     * @var string
     */
    protected $format;

    /**
     * @var string
     */
    protected $mediaId;

    /**
     * @var string
     */
    protected $recognition;

    /**
     * 语音消息媒体id，可以调用多媒体文件下载接口拉取数据。
     *
     * @return string
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * 语音格式，如amr，speex等
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * 语音识别结果
     *
     * @return string
     */
    public function getRecognition()
    {
        return $this->recognition;
    }
} 