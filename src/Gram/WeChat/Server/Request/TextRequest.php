<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:35
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class TextRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class TextRequest extends BaseMessage
{
    /**
     * @var string
     */
    protected $content;

    /**
     * 文本消息内容
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
} 