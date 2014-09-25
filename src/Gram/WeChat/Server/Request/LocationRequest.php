<?php
/**
 *
 *
 * @version   1.0
 * @author    jianphu (me@ljf.me)
 * @create    14-8-22 下午1:41
 * @copyright Copyright (c) 2014 (http://ljf.me)
 */

namespace Gram\WeChat\Server\Request;

/**
 * Class LocationRequest
 *
 * @package Gram\WeChat\Server\Request
 */
class LocationRequest extends BaseMessage
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
     * @var
     */
    protected $scale;
    /**
     * @var
     */
    protected $label;

    function __construct($attributes = array())
    {
        foreach ($attributes as $k => $v) {
            $propertyName = lcfirst($k);
            if ($propertyName === 'location_X') {
                $this->latitude = $v;
                continue;
            }
            if ($propertyName === 'location_Y') {
                $this->longitude = $v;
                continue;
            }
            if (property_exists($this, $propertyName)) {
                $this->{$propertyName} = $v;
            }
        }
    }


    /**
     * 地理位置信息
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * 地理位置维度
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * 地理位置经度
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * 地图缩放大小
     *
     * @return string
     */
    public function getScale()
    {
        return $this->scale;
    }


} 