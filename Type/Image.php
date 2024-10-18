<?php
namespace Tanbolt\Mime\Type;

class Image
{
    public static function mime()
    {
        return [
            'bmp' => 'bmp',
            'cgm' => 'cgm',
            'g3fax' => 'g3',
            'gif' => 'gif',
            'ief' => 'ief',
            'jpeg' => ['jpeg','jpg','jpe'],
            'ktx' => 'ktx',
            'png' => 'png',
            'prs.btif' => 'btif',
            'sgi' => 'sgi',
            'svg+xml' => ['svg','svgz'],
            'tiff' => ['tiff','tif'],
            'vnd.adobe.photoshop' => 'psd',
            'vnd.dece.graphic' => ['uvi','uvvi','uvg','uvvg'],
            'vnd.dvb.subtitle' => 'sub',
            'vnd.djvu' => ['djvu','djv'],
            'vnd.dwg' => 'dwg',
            'vnd.dxf' => 'dxf',
            'vnd.fastbidsheet' => 'fbs',
            'vnd.fpx' => 'fpx',
            'vnd.fst' => 'fst',
            'vnd.fujixerox.edmics-mmr' => 'mmr',
            'vnd.fujixerox.edmics-rlc' => 'rlc',
            'vnd.ms-modi' => 'mdi',
            'vnd.ms-photo' => 'wdp',
            'vnd.net-fpx' => 'npx',
            'vnd.wap.wbmp' => 'wbmp',
            'vnd.xiff' => 'xif',
            'webp' => 'webp',
            'x-3ds' => '3ds',
            'x-cmu-raster' => 'ras',
            'x-cmx' => 'cmx',
            'x-freehand' => ['fh','fhc','fh4','fh5','fh7'],
            'x-icon' => 'ico',
            'x-mrsid-image' => 'sid',
            'x-pcx' => 'pcx',
            'x-pict' => ['pic','pct'],
            'x-portable-anymap' => 'pnm',
            'x-portable-bitmap' => 'pbm',
            'x-portable-graymap' => 'pgm',
            'x-portable-pixmap' => 'ppm',
            'x-rgb' => 'rgb',
            'x-tga' => 'tga',
            'x-xbitmap' => 'xbm',
            'x-xpixmap' => 'xpm',
            'x-xwindowdump' => 'xwd',
        ];
    }
}
