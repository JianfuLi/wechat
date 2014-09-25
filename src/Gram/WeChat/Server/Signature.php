<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-21 下午1:04
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server;

/**
 * Class Signature
 *
 * @package Gram\WeChat\Server
 */
class Signature
{
    protected $token;

    /**
     * @param string $token
     *
     * @throws \InvalidArgumentException
     */
    function __construct($token)
    {
        if (empty($token)) {
            throw new \InvalidArgumentException('验证参数的token不能为空');
        }
        $this->token = $token;
    }

    /**
     * 验证参数是否合法
     *
     * @return bool
     */
    function verify()
    {
        return $_GET['signature'] === $this->createSignature(
            $this->token,
            $_GET['timestamp'],
            $_GET['nonce']
        );
    }

    /**
     * 创建签名
     *
     * @param string $token
     * @param int    $timestamp
     * @param string $nonce
     *
     * @return string
     */
    protected function createSignature($token, $timestamp, $nonce)
    {
        $params = array($token, $timestamp, $nonce);
        sort($params, SORT_STRING);
        $str = implode($params);
        return sha1($str);
    }
} 