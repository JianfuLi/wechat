<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 下午12:51
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Response;

use Gram\WeChat\Server\MessageType;

/**
 * Class ArticleResponse
 *
 * @package Gram\WeChat\Server\Response
 */
class ArticleResponse extends BaseResponse
{
    const XML_TEMPLATE
        = <<<TEMPLATE
<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[%s]]></MsgType>
    <ArticleCount>%s</ArticleCount>
    <Articles>%s</Articles>
</xml>
TEMPLATE;
    const ITEM_TEMPLATE
        = <<<TEMPLATE
<item>
    <Title><![CDATA[%s]]></Title>
    <Description><![CDATA[%s]]></Description>
    <PicUrl><![CDATA[%s]]></PicUrl>
    <Url><![CDATA[%s]]></Url>
</item>
TEMPLATE;

    /**
     * @var array
     */
    public $articles;

    /**
     * @param string $toUserName
     * @param string $fromUserName
     * @param        array <Article> $articles
     */
    function __construct($toUserName, $fromUserName, array $articles)
    {
        $this->articles = $articles;
        parent::__construct($toUserName, $fromUserName, MessageType::NEWS);
    }

    /**
     * 转换成Xml
     *
     * @return string
     */
    function toXml()
    {
        $items = implode(
            '',
            array_map(
                function ($item) {
                    return sprintf(
                        ArticleResponse::ITEM_TEMPLATE,
                        is_null($item->title) ? '' : $item->title,
                        is_null($item->description) ? '' : $item->description,
                        is_null($item->picUrl) ? '' : $item->picUrl,
                        is_null($item->url) ? '' : $item->url
                    );
                },
                $this->articles
            )
        );

        return sprintf(
            self::XML_TEMPLATE,
            $this->toUserName,
            $this->fromUserName,
            $this->createTime,
            $this->msgType,
            count($this->articles),
            $items
        );
    }
}