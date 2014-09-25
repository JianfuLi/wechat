<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-27 下午1:14
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class LocationEvent
 *
 * @package Gram\WeChat\Server\Request
 */
class LocationEvent extends BaseEvent
{
    /**
     * 地理位置纬度
     * @var float
     */
    protected $latitude;

    /**
     * 地理位置经度
     * @var float
     */
    protected $longitude;

    /**
     * 地理位置精度
     * @var float
     */
    protected $precision;

    /**
     * 地理位置纬度
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * 地理位置经度
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * 地理位置精度
     * @return float
     */
    public function getPrecision()
    {
        return $this->precision;
    }
}