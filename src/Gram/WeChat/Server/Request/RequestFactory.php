<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午2:41
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

use Gram\WeChat\Server\EventType;
use Gram\WeChat\Server\MessageType;

/**
 * Class RequestFactory
 *
 * @package Gram\WeChat\Server\Request
 */
class RequestFactory
{
    /**
     * @param array $input
     *
     * @return ImageRequest|LinkRequest|LocationEvent|LocationRequest|MenuEvent|ScanEvent|SubscribeEvent|TextRequest|VideoRequest|VoiceRequest
     */
    static function create(array $input)
    {
        if (isset($input['Event'])) {
            return self::createEvent($input);
        } else {
            return self::createMessage($input);
        }
    }

    /**
     * @param array $input
     *
     * @return ImageRequest|LinkRequest|LocationRequest|TextRequest|VideoRequest|VoiceRequest
     * @throws \InvalidArgumentException
     */
    protected static function createMessage(array $input)
    {
        $messageType = strtoupper($input['MsgType']);
        switch ($messageType) {
            case MessageType::TEXT:
                return new TextRequest($input);
            case MessageType::IMAGE:
                return new ImageRequest($input);
            case MessageType::LINK:
                return new LinkRequest($input);
            case MessageType::LOCATION:
                return new LocationRequest($input);
            case MessageType::VOICE:
                return new VoiceRequest($input);
            case MessageType::VIDEO:
                return new VideoRequest($input);
            default:
                throw new \InvalidArgumentException('不支持“' . $messageType . '”的消息类型');
        }
    }

    /**
     * @param array $input
     *
     * @return LocationEvent|MenuEvent|ScanEvent|SubscribeEvent
     * @throws \InvalidArgumentException
     */
    protected static function createEvent(array $input)
    {
        $messageType = strtoupper($input['MsgType']);
        if ($messageType !== MessageType::EVENT) {
            throw new \InvalidArgumentException('错误的消息类型：“' . $messageType . '”，只能为“' . MessageType::EVENT . '”');
        }

        $event = strtoupper($input['Event']);
        switch ($event) {
            case EventType::SUBSCRIBE:
                return new SubscribeEvent($input);
            case EventType::SCAN:
                return new ScanEvent($input);
            case EventType::LOCATION:
                return new LocationEvent($input);
            case EventType::CLICK:
                return new MenuEvent($input);
            case EventType::VIEW:
                return new MenuEvent($input);
            default :
                throw new \InvalidArgumentException('不支持“' . $event . '”的事件类型');
        }
    }
} 