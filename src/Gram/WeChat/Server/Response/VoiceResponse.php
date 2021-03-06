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
 * Class VoiceResponse
 *
 * @package Gram\WeChat\Server\Response
 */
class VoiceResponse extends BaseResponse
{
    const XML_TEMPLATE
        = <<<TEMPLATE
<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[%s]]></MsgType>
    <Voice>
        <MediaId><![CDATA[%s]]></MediaId>
    </Voice>
</xml>
TEMPLATE;

    /**
     * 通过上传多媒体文件，得到的id
     *
     * @var string
     */
    public $mediaId;

    function __construct($toUserName, $fromUserName, $mediaId)
    {
        if (empty($mediaId)) {
            throw new \InvalidArgumentException('回复语音消息时媒体文件不能为空');
        }
        $this->mediaId = $mediaId;
        parent::__construct($toUserName, $fromUserName, MessageType::VOICE);
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
            $this->mediaId
        );
    }
}