<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:32
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

use Gram\WeChat\Server\Response\TextResponse;
use Gram\WeChat\Server\Response\ImageResponse;
use Gram\WeChat\Server\Response\MusicResponse;
use Gram\WeChat\Server\Response\VideoResponse;
use Gram\WeChat\Server\Response\VoiceResponse;
use Gram\WeChat\Server\Response\ArticleResponse;

/**
 * Class BaseRequest
 *
 * @package Gram\WeChat\Server\Request
 */
abstract class BaseRequest
{
    /**
     * @var string
     */
    protected $toUserName;
    /**
     * @var string
     */
    protected $fromUserName;
    /**
     * @var int
     */
    protected $createTime;
    /**
     * @var string
     */
    protected $msgType;

    /**
     * @param array $attributes
     */
    function __construct($attributes = array())
    {
        foreach ($attributes as $k => $v) {
            $propertyName = lcfirst($k);
            if (property_exists($this, $propertyName)) {
                $this->{$propertyName} = $v;
            }
        }
    }

    /**
     * 消息创建时间 （整型）
     *
     * @return int
     */
    function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 发送方帐号（一个OpenID）
     *
     * @return string
     */
    function getFromUserName()
    {
        return $this->fromUserName;
    }

    /**
     * 消息类型
     *
     * @return string
     */
    function getMsgType()
    {
        return $this->msgType;
    }

    /**
     * 开发者微信号
     *
     * @return string
     */
    function getToUserName()
    {
        return $this->toUserName;
    }

    /**
     * 回复文本消息
     *
     * @param $content
     *
     * @return TextResponse
     */
    function respondText($content)
    {
        return new TextResponse(
            $this->getFromUserName(),
            $this->getToUserName(),
            $content
        );
    }

    /**
     * 回复图片消息
     *
     * @param $mediaId
     *
     * @return ImageResponse
     */
    function respondImage($mediaId)
    {
        return new ImageResponse(
            $this->getFromUserName(),
            $this->getToUserName(),
            $mediaId
        );
    }

    /**
     * 回复语音消息
     *
     * @param $mediaId
     *
     * @return VoiceResponse
     */
    function respondVoice($mediaId)
    {
        return new VoiceResponse(
            $this->getFromUserName(),
            $this->getToUserName(),
            $mediaId
        );
    }

    /**
     * 回复视频消息
     *
     * @param string $mediaId
     * @param string $title
     * @param string $description
     *
     * @return VoiceResponse
     */
    function respondVideo($mediaId, $title = null, $description = null)
    {
        return new VideoResponse(
            $this->getFromUserName(),
            $this->getToUserName(),
            $mediaId,
            $title,
            $description
        );
    }

    /**
     * 回复音乐消息
     *
     * @param string $thumbMediaId
     * @param string $title
     * @param string $description
     * @param string $musicUrl
     * @param string $hQMusicUrl
     *
     * @return MusicResponse
     */
    function respondMusic($thumbMediaId, $title = null, $description = null, $musicUrl = null, $hQMusicUrl = null)
    {
        return new MusicResponse(
            $this->getFromUserName(),
            $this->getToUserName(),
            $thumbMediaId,
            $title,
            $description,
            $musicUrl,
            $hQMusicUrl
        );
    }

    /**
     * 回复图文消息
     *
     * @param array <Gram\WeChat\Response\TextResponse\Article> $articles
     *
     * @return ArticleResponse
     */
    function respondArticles(array $articles)
    {
        return new ArticleResponse(
            $this->getFromUserName(),
            $this->getToUserName(),
            $articles
        );
    }

    /**
     * @return string
     */
    function __toString()
    {
        $data = array();
        foreach ($this as $k => $v) {
            $data[$k] = $v;
        }
        return json_encode($data);
    }
}