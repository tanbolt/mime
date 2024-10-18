<?php
namespace Tanbolt\Mime;

/**
 * Class Mime: MimeType 映射表
 * @package Tanbolt\Mime
 * @method static array Common()
 * @method static array Application()
 * @method static array Audio()
 * @method static array Image()
 * @method static array Model()
 * @method static array Text()
 * @method static array Video()
 * @method static array Other()
 */
class Mime
{
    public static function __callStatic($name, $arguments)
    {
        /** @var Type\Common $class */
        $class = __NAMESPACE__.'\\Type\\'.$name;
        return $class::mime();
    }
}
