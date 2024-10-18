<?php

use Tanbolt\Mime\Magic;
use PHPUnit\Framework\TestCase;

class MagicTest extends TestCase
{
    public function testFakeExtension()
    {
        $file = __DIR__.'/file/image_txt.jpg';
        static::assertEquals('jpg', Magic::getExtension($file));
        static::assertEquals('txt', Magic::guessExtensionByFile($file));
        static::assertEquals('text/plain', Magic::guessMimeTypeByFile($file));
    }

    public function testGetExtensionByMap()
    {
        $map = [
            'image/pjpeg' => ['jpg', 'jpeg', 'jpgg'],
            'image/gif' => 'gif',
        ];
        static::assertEquals('gif', Magic::guessExtensionThroughMap('image/gif', $map));
        static::assertEquals('gif', Magic::guessExtensionThroughMap('image/gif', $map, 'txt'));

        static::assertEquals('jpg', Magic::guessExtensionThroughMap('image/pjpeg', $map));
        static::assertEquals('jpeg', Magic::guessExtensionThroughMap('image/pjpeg', $map, 'jpeg'));
        static::assertEquals('jpgg', Magic::guessExtensionThroughMap('image/pjpeg', $map, ['png', 'jpgg']));

        static::assertNull(Magic::guessExtensionThroughMap('image/png', $map));
    }

    public function testGetMimeTypeByMap()
    {
        $map = [
            'image/pjpeg' => ['jpg', 'jpeg', 'jpgg'],
            'image/gif' => 'gif',
        ];
        static::assertEquals('image/gif', Magic::guessMimeTypeThroughMap('gif', $map));
        static::assertEquals('image/pjpeg', Magic::guessMimeTypeThroughMap('jpg', $map));
        static::assertEquals('image/pjpeg', Magic::guessMimeTypeThroughMap('jpeg', $map));
        static::assertNull(Magic::guessMimeTypeThroughMap('png', $map));
    }

    /**
     * @dataProvider dataList
     * @param $extension
     * @param $mimeType
     */
    public function testGetMimeTypeByExtension($extension, $mimeType)
    {
        static::assertEquals($extension, Magic::guessExtensionByMimeType($mimeType));
        static::assertEquals($mimeType, Magic::guessMimeTypeByExtension($extension));
    }

    /**
     * @dataProvider dataList
     * @param $extension
     * @param $mimeType
     */
    public function testGetExtensionAndMimeType($extension, $mimeType)
    {
        $file = __DIR__.'/file/HelloWorld_'.$extension;
        $content = file_get_contents($file);

        static::assertEquals($extension, Magic::guessExtensionByFile($file));
        static::assertEquals($extension, Magic::guessExtensionByContent($content));

        static::assertEquals($mimeType, Magic::guessMimeTypeByFile($file));
        static::assertEquals($mimeType, Magic::guessMimeTypeByContent($content));
    }

    public function dataList()
    {
        return [
            ['jpg', 'image/jpeg'],
            ['mid', 'audio/midi'],
            ['pdf', 'application/pdf'],
            ['png', 'image/png'],
            ['rtf', 'text/rtf'],
            ['svg', 'image/svg+xml'],
            ['zip', 'application/zip'],
        ];
    }
}
