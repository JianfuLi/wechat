<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 下午12:00
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Response;

use Gram\WeChat\Server\MessageType;

/**
 * Class TextResponse
 *
 * @package Gram\WeChat\Server\Response
 */
class TextResponse extends BaseResponse
{
    const XML_TEMPLATE
        = <<<TEMPLATE
<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[%s]]></MsgType>
    <Content><![CDATA[%s]]></Content>
</xml>
TEMPLATE;


    /**
     * 回复的消息内容（换行：在content中能够换行，微信客户端就支持换行显示）
     *
     * @var
     */
    public $content;

    function __construct($toUserName, $fromUserName, $content)
    {
        if (is_null($content)) {
            throw new \InvalidArgumentException('回复文本消息时文本内容不能为空');
        }
        $this->content = $content;
        parent::__construct($toUserName, $fromUserName, MessageType::TEXT);
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
            $this->content
        );
    }
}