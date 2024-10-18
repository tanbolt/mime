<?php
namespace Tanbolt\Mime\Type;

class Video
{
    public static function mime()
    {
        return [
            '3gpp' => '3gp',
            '3gpp2' => '3g2',
            'h261' => 'h261',
            'h263' => 'h263',
            'h264' => 'h264',
            'jpeg' => 'jpgv',
            'jpm' => ['jpm','jpgm'],
            'mj2' => ['mj2','mjp2'],
            'mp4' => ['mp4','mp4v','mpg4'],
            'mpeg' => ['mpeg','mpg','mpe','m1v','m2v'],
            'ogg' => 'ogv',
            'quicktime' => ['qt','mov'],
            'vnd.dece.hd' => ['uvh','uvvh'],
            'vnd.dece.mobile' => ['uvm','uvvm'],
            'vnd.dece.pd' => ['uvp','uvvp'],
            'vnd.dece.sd' => ['uvs','uvvs'],
            'vnd.dece.video' => ['uvv','uvvv'],
            'vnd.dvb.file' => 'dvb',
            'vnd.fvt' => 'fvt',
            'vnd.mpegurl' => ['mxu','m4u'],
            'vnd.ms-playready.media.pyv' => 'pyv',
            'vnd.uvvu.mp4' => ['uvu','uvvu'],
            'vnd.vivo' => 'viv',
            'webm' => 'webm',
            'x-f4v' => 'f4v',
            'x-fli' => 'fli',
            'x-flv' => 'flv',
            'x-m4v' => 'm4v',
            'x-matroska' => ['mkv','mk3d','mks'],
            'x-mng' => 'mng',
            'x-ms-asf' => ['asf','asx'],
            'x-ms-vob' => 'vob',
            'x-ms-wm' => 'wm',
            'x-ms-wmv' => 'wmv',
            'x-ms-wmx' => 'wmx',
            'x-ms-wvx' => 'wvx',
            'x-msvideo' => 'avi',
            'x-sgi-movie' => 'movie',
            'x-smv' => 'smv',
        ];
    }
}
