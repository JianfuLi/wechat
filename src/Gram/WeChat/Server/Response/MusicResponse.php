<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 下午12:47
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Response;

use Gram\WeChat\Server\MessageType;

/**
 * Class MusicResponse
 *
 * @package Gram\WeChat\Server\Response
 */
class MusicResponse extends BaseResponse
{
    const XML_TEMPLATE
        = <<<TEMPLATE
<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[%s]]></MsgType>
    <Music>
        <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <MusicUrl><![CDATA[%s]]></MusicUrl>
        <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
    </Music>
</xml>
TEMPLATE;

    /**
     * 缩略图的媒体id，通过上传多媒体文件，得到的id
     *
     * @var string
     */
    public $thumbMediaId;
    /**
     * 音乐标题
     * @var string
     */
    public $title;
    /**
     * 音乐描述
     * @var string
     */
    public $description;
    /**
     * 音乐链接
     * @var string
     */
    public $musicUrl;
    /**
     * 高质量音乐链接，WIFI环境优先使用该链接播放音乐
     *
     * @var string
     */
    public $hQMusicUrl;

    function __construct($toUserName, $fromUserName, $thumbMediaId)
    {
        if (is_null($thumbMediaId)) {
            throw new \InvalidArgumentException('回复音乐消息时媒体文件不能为空');
        }
        $this->thumbMediaId = $thumbMediaId;
        parent::__construct($toUserName, $fromUserName, MessageType::MUSIC);
    }

    /**
     * 转换成Xml
     *
     * @return string
     */
    function toXml()
    {
        return sprintf(
            self::XML_TEMPLATE,
            $this->toUserName,
            $this->fromUserName,
            $this->createTime,
            $this->msgType,
            $this->thumbMediaId,
            is_null($this->title) ? '' : $this->title,
            is_null($this->description) ? '' : $this->description,
            is_null($this->musicUrl) ? '' : $this->musicUrl,
            is_null($this->hQMusicUrl) ? '' : $this->hQMusicUrl
        );
    }
}