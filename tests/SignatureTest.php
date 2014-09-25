<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-21 下午1:02
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */
use Gram\WeChat\Signature;

class SignatureTest extends PHPUnit_Framework_TestCase
{
    public $token = 'test';

    public function createSignature()
    {
        return new Signature($this->token);
    }

    public function testVerify()
    {
        $excepted = true;

        $_GET = array(
            'signature' => 'c0b5d4f11ec3527a98fd0b40d0d1ca8b1236aefd',
            'echostr'   => '6551223951546998773',
            'timestamp' => '1408589809',
            'nonce'     => '150335837'
        );

        $actual = $this->createSignature()->verify();
        $this->assertEquals($excepted, $actual);
    }

    public function testEchoStrIsOK()
    {
        $excepted = '6551223951546998773';

        $_GET = array(
            'signature' => 'c0b5d4f11ec3527a98fd0b40d0d1ca8b1236aefd',
            'echostr'   => $excepted,
            'timestamp' => '1408589809',
            'nonce'     => '150335837'
        );

        $actual = $this->createSignature()->echoStr();
        $this->assertEquals($excepted, $actual);
    }

    public function testEchoStrIsEmpty()
    {
        $excepted = '';

        $_GET = array(
            'signature' => '',
            'echostr'   => '6551223951546998773',
            'timestamp' => '',
            'nonce'     => ''
        );

        $actual = $this->createSignature()->echoStr();
        $this->assertEquals($excepted, $actual);
    }
}