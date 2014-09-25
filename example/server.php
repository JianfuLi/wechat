<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-26 下午2:35
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

$loader = require '../vendor/autoload.php';
$loader->add('Gram\WeChat', '../src');

use Gram\WeChat\Server\Route;
use Gram\WeChat\Server\MessageType;
use Gram\WeChat\Server\Request\TextRequest;
use Gram\WeChat\Server\Request\ImageRequest;
use Gram\WeChat\Server\Request\VideoRequest;
use Gram\WeChat\Server\Request\VoiceRequest;
use Gram\WeChat\Server\Request\LocationRequest;
use Gram\WeChat\Server\Request\LinkRequest;
use Gram\WeChat\Server\EventType;
use Gram\WeChat\Server\Request\SubscribeEvent;
use Gram\WeChat\Server\Request\MenuEvent;
use Gram\WeChat\Server\Request\LocationEvent;
use Gram\WeChat\Server\Request\ScanEvent;

$token = 'test';
$route = new Route($token);
//响应用户发送的文本消息
$route->message(
    MessageType::TEXT,
    function (TextRequest $req) {
        return $req->respondText(strval($req));
    }
);
//响应用户发送的图片消息
$route->message(
    MessageType::IMAGE,
    function (ImageRequest $req) {
        return $req->respondImage($req->getMediaId());
    }
);
//响应用户发送的视频消息
$route->message(
    MessageType::VIDEO,
    function (VideoRequest $req) {
        return $req->respondVideo($req->getMediaId(), 'test title', 'test description');
    }
);
//响应用户发送的语音消息
$route->message(
    MessageType::VOICE,
    function (VoiceRequest $req) {
        return $req->respondVoice($req->getMediaId());
    }
);
//响应用户发送的位置消息
$route->message(
    MessageType::LOCATION,
    function (LocationRequest $req) {
        return $req->respondText(strval($req));
    }
);
//响应用户发送的链接消息
$route->message(
    MessageType::LINK,
    function (LinkRequest $req) {
        return $req->respondText(strval($req));
    }
);

//响应用户的订阅事件
$route->event(
    EventType::SUBSCRIBE,
    function (SubscribeEvent $event) {
        return $event->respondText('感谢关注我们' . $event->getEvent() . ',' . $event->getEventKey());
    }
);
//响应用户的点击菜单事件
$route->event(
    EventType::CLICK,
    function (MenuEvent $event) {
        return $event->respondText('你点击菜单' . $event->getEvent() . ',' . $event->getEventKey());
    }
);
//响应用户的点击菜单查看Url事件
$route->event(
    EventType::VIEW,
    function (MenuEvent $event) {
        return $event->respondText('你点击菜单' . $event->getEvent() . ',' . $event->getEventKey());
    }
);
//响应用户的上报位置事件
$route->event(
    EventType::LOCATION,
    function (LocationEvent $event) {
        return $event->respondText('上报位置' . $event->getEvent() . ',' . $event->getLatitude() . ':' . $event->getLongitude());
    }
);
//响应用户的扫描二维码事件
$route->event(
    EventType::SCAN,
    function (ScanEvent $event) {
        return $event->respondText('扫描二维码' . $event->getEvent() . ',' . $event->getEventKey() . ',' . $event->getTicket());
    }
);

$route->run();