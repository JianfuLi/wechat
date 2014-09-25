<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 下午12:36
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Response;

use Gram\WeChat\Server\MessageType;

/**
 * Class VideoResponse
 *
 * @package Gram\WeChat\Server\Response
 */
class VideoResponse extends BaseResponse
{
    const XML_TEMPLATE
        = <<<TEMPLATE
<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[%s]]></MsgType>
    <Video>
        <MediaId><![CDATA[%s]]></MediaId>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
    </Video>
</xml>
TEMPLATE;

    /**
     * 视频消息的标题
     * @var string
     */
    public $title;

    /**
     * 视频消息的描述
     * @var string
     */
    public $description;

    /**
     * 通过上传多媒体文件，得到的id
     *
     * @var string
     */
    public $mediaId;

    function __construct($toUserName, $fromUserName, $mediaId, $title = null, $description = null)
    {
        if (empty($mediaId)) {
            throw new \InvalidArgumentException('回复视频消息时媒体文件不能为空');
        }
        $this->mediaId = $mediaId;
        $this->title = $title;
        $this->description = $description;
        parent::__construct($toUserName, $fromUserName, MessageType::VIDEO);
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
            $this->mediaId,
            is_null($this->title) ? '' : $this->title,
            is_null($this->description) ? '' : $this->description
        );
    }
}