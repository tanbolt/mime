<?php
namespace Tanbolt\Mime\Type;

class Audio
{
    public static function mime()
    {
        return [
            'adpcm' => 'adp',
            'basic' => ['au','snd'],
            'midi' => ['mid','midi','kar','rmi'],
            'mp4' => 'mp4a',
            'mpeg' => ['mpga','mp2','mp2a','mp3','m2a','m3a'],
            'ogg' => ['oga','ogg','spx'],
            's3m' => 's3m',
            'silk' => 'sil',
            'vnd.dece.audio' => ['uva','uvva'],
            'vnd.digital-winds' => 'eol',
            'vnd.dra' => 'dra',
            'vnd.dts' => 'dts',
            'vnd.dts.hd' => 'dtshd',
            'vnd.lucent.voice' => 'lvp',
            'vnd.ms-playready.media.pya' => 'pya',
            'vnd.nuera.ecelp4800' => 'ecelp4800',
            'vnd.nuera.ecelp7470' => 'ecelp7470',
            'vnd.nuera.ecelp9600' => 'ecelp9600',
            'vnd.rip' => 'rip',
            'webm' => 'weba',
            'x-aac' => 'aac',
            'x-aiff' => ['aif','aiff','aifc'],
            'x-caf' => 'caf',
            'x-flac' => 'flac',
            'x-matroska' => 'mka',
            'x-mpegurl' => 'm3u',
            'x-ms-wax' => 'wax',
            'x-ms-wma' => 'wma',
            'x-pn-realaudio' => ['ram','ra'],
            'x-pn-realaudio-plugin' => 'rmp',
            'x-wav' => 'wav',
            'xm' => 'xm',
        ];
    }
}
