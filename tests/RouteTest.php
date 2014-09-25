<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-21 下午2:34
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

class RouteTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Gram\WeChat\Route
     */
    public $route;

    public function setUp()
    {
        $this->route = new \Gram\WeChat\Route('');
    }

    public function testBindHasOneListener()
    {
        $this->route->bind(
            \Gram\WeChat\MessageType::TEXT,
            function () {
            }
        );
        $this->assertEquals(1, count($this->route->getListeners()));
    }

    public function testBindEmpty()
    {
        $this->assertEquals(0, count($this->route->getListeners()));
    }

    public function testSignature()
    {
        $_GET = array(
            'signature' => '',
            'timestamp' => '',
            'nonce'     => '',
            'echostr'   => '',
        );

        $this->route->run();
    }

    public function testResponseText()
    {
        $_GET = array(
            'signature' => '',
            'timestamp' => '',
            'nonce'     => '',
            'echostr'   => '',
        );

        $this->route->bind(\Gram\WeChat\MessageType::TEXT,
            function (\Gram\WeChat\Request\Text $req) {
                return $req->createText('');
            }
        );
    }
}