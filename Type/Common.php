<?php
namespace Tanbolt\Mime\Type;

class Common
{
    /**
     * 常见文件格式 对于 web 程序而言 这些文件格式一般就够用了
     * 注意 这里所列出的 mimeType 并不完全符合 RFC 4288 但实际情况下确实又会碰到
     * @return array
     */
    public static function mime()
    {
        return [

            // Web 常用图片格式
            'image/png' => 'png',
            'image/x-png' => 'png',
            'image/jpeg' => ['jpg', 'jpeg'],
            'image/pjpeg' => ['jpg', 'jpeg'],
            'image/gif' => 'gif',
            'image/webp' => 'webp',

            // 常用脚本文件
            'text/css' => 'css',
            'text/html' => ['html', 'htm', 'shtml'],
            'application/xhtml+xml' => ['xhtml', 'html', 'htm', 'shtml'],
            'application/javascript' => 'js',
            'application/x-javascript' => 'js',
            'text/javascript' => 'js',
            'application/atom+xml' => 'atom',
            'application/json' => 'json',
            'application/x-json' => 'json',
            'text/xml' => 'xml',
            'image/svg+xml' => 'svg',
            'application/xml' => ['xml', 'xsl', 'svg'],
            'application/x-xml' => 'xml',
            'application/rss+xml' => 'rss',
            'application/rdf+xml' => 'rdf',
            'text/x-php' => 'php',
            'text/plain' => ['txt','css','js','html','htm','shtml','atom','json','xml','xsl','svg','rss','rdf'],

            // 其他图片格式
            'image/bmp' => 'bmp',
            'image/x-bmp' => 'bmp',
            'image/x-bitmap' => 'bmp',
            'image/x-xbitmap' => 'bmp',
            'image/ms-bmp' => 'bmp',
            'image/x-ms-bmp' => 'bmp',
            'image/x-win-bitmap' => 'bmp',
            'image/x-windows-bmp' => 'bmp',
            'application/bmp' => 'bmp',
            'application/x-bmp' => 'bmp',
            'application/x-win-bitmap' => 'bmp',

            'image/vnd.adobe.photoshop' => 'psd',
            'application/x-photoshop' => 'psd',
            'application/postscript' => ['ps', 'eps', 'ai'],
            'image/tiff' => 'tif',
            'image/x-tiff' => 'tif',
            'image/vnd.dwg' => 'dwg',
            'image/x-dwg' => 'dwg',
            'application/acad' => 'dwg',
            'image/x-3ds' => '3ds',
            'image/x-ico' => 'ico',
            'image/x-icon' => 'ico',
            'image/vnd.microsoft.icon' => 'ico',
            'image/x-tga' => 'tga',
            'image/vnd.dxf' => 'dxf',
            'application/dxf' => 'dxf',
            'image/cgm' => 'cgm',

            // 富文本文件
            'application/msword' => ['doc','docx'],
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'application/vnd.ms-word.document.macroenabled.12' => 'docm',
            'application/vnd.ms-word.template.macroenabled.12' => 'dotm',
            'application/vnd.wordperfect' =>'wpd',
            'application/wordperfect' => 'wpd',
            'application/x-wpwin' => 'wpd',
            'application/vnd.ms-works' => 'wps',
            'text/rtf' =>  'rtf',
            'application/rtf' =>  'rtf',
            'application/x-rtf' => 'rtf',
            'text/richtext' => 'rtf',
            'application/pdf' => 'pdf',
            'application/x-download' => 'pdf',
            'application/force-download' => 'pdf',
            'application/vnd.ms-htmlhelp' => 'chm',

            // 制表文件
            'application/vnd.ms-excel' => ['xls','xlsx'],
            'application/excel' => 'xls',
            'application/xls' => 'xls',
            'application/x-xls' => 'xls',
            'application/x-excel' => 'xls',
            'application/x-msexcel' => 'xls',
            'application/x-ms-excel' => 'xls',
            'application/x-dos_ms_excel' => 'xls',
            'application/msexcel' => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/vnd.ms-excel.sheet.macroenabled.12' => 'xlsm',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.template' => 'xltx',
            'application/vnd.ms-excel.template.macroenabled.12' => 'xltm',
            'application/vnd.ms-excel.sheet.binary.macroenabled.12' => 'xlsb',
            'application/vnd.ms-excel.addin.macroenabled.12' => 'xlam',
            'application/vnd.oasis.opendocument.spreadsheet-template' => 'ots',

            // 演示文档 ppt
            'application/vnd.ms-powerpoint' => 'ppt',
            'application/mspowerpoint' => 'ppt',
            'application/powerpoint' => 'ppt',
            'application/x-mspowerpoint' => 'ppt',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/vnd.ms-powerpoint.presentation.macroenabled.12' => 'pptm',
            'application/vnd.openxmlformats-officedocument.presentationml.template' => 'potx',
            'application/vnd.ms-powerpoint.template.macroenabled.12' => 'potm',
            'application/vnd.ms-powerpoint.addin.macroenabled.12' => 'ppam',
            'application/vnd.openxmlformats-officedocument.presentationml.slideshow' => 'ppsx',
            'application/vnd.ms-powerpoint.slideshow.macroenabled.12' => 'ppsm',
            'application/vnd.openxmlformats-officedocument.presentationml.slide' => 'sldx',
            'application/vnd.ms-powerpoint.slide.macroenabled.12' => 'sldm',
            'application/vnd.ms-officetheme' => 'thmx',

            // MS office
            'application/vnd.ms-office' => ['xls', 'doc', 'ppt'],

            // 因为 php 版本或 文件问题会导致 MimeType 获取不到
            // 考虑到 office 属于较为常见文件格式 且 属于安全文件范畴
            // 此处添加这么一个奇葩的 mime
            'cdf v2 document, corrupt: can\'t expand summary_info' => ['doc', 'xls', 'ppt'],

            // 常用压缩文件格式
            'application/x-7z-compressed' => '7z',
            'application/x-rar-compressed' => 'rar',
            'application/x-rar' => 'rar',
            'application/rar' => 'rar',

            # zip 格式较为特殊, 不少应用程序的文件其实都以 zip 为外壳的
            'application/zip' => ['zip', 'xls', 'xlsx', 'docx', 'ppt', 'pptx', 'fla'],
            'application/x-zip' => 'zip',
            'application/x-zip-compressed' => 'zip',
            'application/s-compressed' => 'zip',
            'multipart/x-zip' => 'zip',
            'application/x-compressed' => ['zip', 'gz'],
            'application/x-tar' => 'tar',
            'application/x-gzip' => 'gz',
            'application/x-bzip' =>'bz',
            'application/x-bzip2' => 'bz2',
            'application/x-xz' => 'xz',

            // 音频文件
            'audio/mp3' => 'mp3',
            'audio/mpeg3' => 'mp3',
            'audio/x-mpeg-3' => 'mp3',
            'audio/mpg' => 'mp3',
            'video/x-mpeg' => 'mp3',
            'audio/mpeg' => 'mpg',
            'video/mpeg' => ['mpeg', 'mpg'],
            'audio/wav' => 'wav',
            'audio/x-wav' => 'wav',
            'audio/wave' => 'wav',
            'audio/midi' => 'mid',
            'audio/x-mid' => 'mid',
            'audio/x-midi' => 'mid',
            'x-music/x-midi' => 'mid',
            'music/crescendo' => 'mid',
            'application/x-midi' => 'mid',
            'audio/x-ms-wma' => 'wma',
            'video/x-ms-asf' => ['asf','asx'],
            'audio/x-pn-realaudio' => 'ra',
            'audio/x-pn-realaudio-plugin' => 'ra',
            'audio/x-realaudio' => 'ra',
            'audio/ogg' => 'ogg',
            'audio/x-aiff' => 'aif',
            'audio/aiff' => 'aif',
            'audio/basic' => 'au',
            'audio/x-au' => 'au',
            'audio/mp4' =>  'mp4a',
            'audio/x-mpegurl' => 'm3u',
            'audio/x-mpequrl' => 'm3u',
            'application/vnd.apple.mpegurl' => 'm3u8',

            // 视频文件
            'video/3gpp2' => '3g2',
            'video/3gp' => '3gp',
            'video/3gpp' => ['3gpp', '3gp'],
            'video/avi' => 'avi',
            'video/msvideo' => 'avi',
            'video/x-msvideo' => 'avi',
            'application/x-troff-msvideo' => 'avi',
            'video/x-flv' => 'flv',
            'video/x-m4v' => 'm4v',
            'video/quicktime' => 'mov',
            'video/mp4' => 'mp4',
            'application/vnd.rn-realmedia-vbr' => 'rmvb',
            'video/x-ms-wmv' => 'wmv',
            'video/x-matroska' => 'mkv',
            'video/x-ms-vob' => 'vob',
            'application/x-shockwave-flash' => 'swf',
            'application/vnd.rn-realmedia' => 'rm',
            'model/vrml' => 'vrml',
            'application/x-vrml' => 'vrml',
            'x-world/x-vrml' => 'vrml',
            'model/x3d+xml' => 'x3d',
            'model/x3d+binary' => 'x3db',
            'model/x3d+vrml' => 'x3dv',

            // 字体文件
            'application/x-font-otf' => 'otf',
            'application/x-font-ttf' => 'ttf',
            'application/vnd.ms-fontobject' => 'eot',
            'application/font-woff' => 'woff',
            'application/x-font-woff' => 'woff',
            'application/vnd.ms-opentype' => ['ttf','otf','ttc'],
        ];
    }
}
