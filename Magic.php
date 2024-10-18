<?php
namespace Tanbolt\Mime;

use finfo;
use ErrorException;

/**
 * Class Magic: 文件 MiniType/Extension 处理工具
 * > 注意：该工具并不能保证结果正确无误，仅作为参考，适合用于相对安全的使用场景。
 * 对于上传文件过滤，不应该完全依赖该工具，有些文件可能通过伪造文件头的方式进行对抗
 * @package Tanbolt\Mime
 */
class Magic
{
    /**
     * @var finfo
     */
    private static $fileInfo;

    /**
     * 获取 finfo 对象
     * @param false $throw
     * @return finfo
     * @throws
     */
    private static function getFInfo(bool $throw = false)
    {
        if (null === static::$fileInfo) {
            static::$fileInfo = class_exists('\finfo') ? new finfo() : false;
        }
        if ($throw && !static::$fileInfo) {
            throw new ErrorException('Class \'finfo\' not found');
        }
        return static::$fileInfo;
    }

    /**
     * 由 [文件后缀] -> 使用 [内置映射] 猜测 [mimeType]
     * @param string $extension
     * @return ?string
     */
    public static function guessMimeTypeByExtension(string $extension)
    {
        if (empty($extension)) {
            return null;
        }
        // 先使用常见格式映射, 若无法匹配, 进行下一步匹配
        $extension = trim(strtolower($extension));
        $mime = static::guessMimeTypeThroughMap($extension, Mime::Common());
        if (null !== $mime) {
            return $mime;
        }
        foreach (['Text', 'Image', 'Audio', 'Video', 'Application', 'Model', 'Other'] as $method) {
            $mime = static::guessMimeTypeThroughMap($extension, Mime::$method());
            if (null !== $mime) {
                return 'Other' === $method ? $mime : lcfirst($method).'/'.$mime;
            }
        }
        return null;
    }

    /**
     * 由 [文件路径] -> 通过其 [文件内容] 猜测 [mimeType]
     * @param string $file
     * @return ?string
     * @throws
     */
    public static function guessMimeTypeByFile(string $file)
    {
        $fInfo = static::getFInfo(true);
        $fInfo->set_flags(FILEINFO_MIME_TYPE);
        $mimeType = $fInfo->file($file);
        return $mimeType ? strtolower($mimeType) : null;
    }

    /**
     * 由 [文件内容] -> 猜测 [mimeType]
     * @param string $content
     * @return ?string
     * @throws
     */
    public static function guessMimeTypeByContent(string $content)
    {
        if (empty($content)) {
            return null;
        }
        $fInfo = static::getFInfo(true);
        $fInfo->set_flags(FILEINFO_MIME_TYPE);
        $mimeType = $fInfo->buffer($content);
        return $mimeType ? strtolower($mimeType) : null;
    }

    /**
     * 从 [文件路径(名)] -> 提取 [文件后缀]
     * @param string $path
     * @return ?string
     */
    public static function getExtension(string $path)
    {
        return pathinfo($path, PATHINFO_EXTENSION) ?: null;
    }

    /**
     * 由 [mimeType] -> 使用 [内置的映射] 猜测 [文件后缀]
     * @param string $mime
     * @param array|string|null $guessExtensions mineType 可能对应多个后缀, 可通过该参数设置一个或多个优先使用的后缀名称
     * @return ?string
     */
    public static function guessExtensionByMimeType(string $mime, $guessExtensions = null)
    {
        if (empty($mime)) {
            return null;
        }
        // 先使用常见格式 mimeType 映射表, 若无法匹配, 进行下一步匹配
        $mime = strtolower($mime);
        $extension = static::guessExtensionThroughMap($mime, Mime::Common(), $guessExtensions);
        if (null === $extension) {
            if (strpos($mime, '/') && 2 === count(($mimes = explode('/', $mime))) ) {
                $method = strtolower($mime[0]);
                if (in_array($method, ['text', 'image', 'audio', 'video', 'application', 'model'])) {
                    $method = ucfirst($method);
                    $mineType = $mimes[1];
                } else {
                    $method = 'Other';
                    $mineType = $mime;
                }
                $extension = static::guessExtensionThroughMap($mineType, Mime::$method(), $guessExtensions);
            }
        }
        return $extension;
    }

    /**
     * 由 [指定的文件路径] -> 通过其 [文件内容] 猜测 [文件后缀]
     * @param string $file
     * @return ?string
     * @throws
     */
    public static function guessExtensionByFile(string $file)
    {
        /*
         * 虽然从 PHP7.2 开始 finfo 支持 EXTENSION flag, 但实际表现不如人意,
         * 这里现获取 mimeType 再使用内置映射获取 extension
         * https://www.php.net/manual/zh/fileinfo.constants.php
         */
        // if ($fInfo = defined('FILEINFO_EXTENSION') ? static::getFInfo() : false) {
        //     $fInfo->set_flags(FILEINFO_EXTENSION);
        //     $extension = $fInfo->file($file);
        //     return !$extension || '???' === $extension ? null
        //         : static::guessPerfectExtension(explode('/', $extension), static::getExtension($file));
        // }
        return static::guessExtensionByMimeType(static::guessMimeTypeByFile($file), static::getExtension($file));
    }

    /**
     * 由 [指定的文件内容] -> 猜测 [文件后缀]
     * @param string $content
     * @return ?string
     * @throws
     */
    public static function guessExtensionByContent(string $content)
    {
        // if ($fInfo = defined('FILEINFO_EXTENSION') ? static::getFInfo() : false) {
        //     $fInfo->set_flags(FILEINFO_EXTENSION);
        //     $extension = $fInfo->buffer($content);
        //     if (!$extension || '???' === $extension) {
        //         return null;
        //     }
        //     $extension = explode('/', $extension);
        //     return count($extension) ? $extension[0] : null;
        // }
        return static::guessExtensionByMimeType(static::guessMimeTypeByContent($content));
    }

    /**
     * 由 [mimeType] 和 [指定的映射关系] -> 获取 [文件后缀]
     * @param string $mime mimeType
     * @param array $map 指定的 mimeType 映射表
     * @param array|string|null $guessExtensions mimeType 可能对应多个后缀, 可通过该参数设置一个或多个优先使用的后缀名称
     * @return ?string
     */
    public static function guessExtensionThroughMap(string $mime, array $map, $guessExtensions = null)
    {
        $extension = null;
        if ($mime && isset($map[$mime])) {
            $extension = $map[$mime];
            $extension = is_array($extension) ? static::guessPerfectExtension($extension, $guessExtensions) : $extension;
        }
        return $extension;
    }

    /**
     * 匹配最佳 extension
     * @param array $extension
     * @param array|string|null $guessExtensions
     * @return array|string
     */
    private static function guessPerfectExtension(array $extension, $guessExtensions = null)
    {
        if ($guessExtensions && is_string($guessExtensions)) {
            $guessExtensions = [$guessExtensions];
        }
        $preferred = is_array($guessExtensions) ? array_values(array_intersect($guessExtensions, $extension)) : [];
        return count($preferred) ? $preferred[0] : $extension[0];
    }

    /**
     * 由 [文件后缀] 和 [指定的映射关系] -> 获取 [mimeType]
     * @param string $extension 类型
     * @param array $map 映射
     * @return ?string
     */
    public static function guessMimeTypeThroughMap(string $extension, array $map)
    {
        if (empty($extension)) {
            return null;
        }
        foreach ($map as $key => $value) {
           if ( $extension === $value || (is_array($value) && in_array($extension, $value)) ) {
               return $key;
           }
        }
        return null;
    }
}
