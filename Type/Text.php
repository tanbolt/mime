<?php
namespace Tanbolt\Mime\Type;

class Text
{
    public static function mime()
    {
        return [
            'cache-manifest' => 'appcache',
            'calendar' => ['ics','ifb'],
            'css' => 'css',
            'csv' => 'csv',
            'html' => ['html','htm'],
            'n3' => 'n3',
            'plain' => ['txt','text','conf','def','list','log','in'],
            'prs.lines.tag' => 'dsc',
            'richtext' => 'rtx',
            'sgml' => ['sgml','sgm'],
            'tab-separated-values' => 'tsv',
            'troff' => ['t','tr','roff','man','me','ms'],
            'turtle' => 'ttl',
            'uri-list' => ['uri','uris','urls'],
            'vcard' => 'vcard',
            'vnd.curl' => 'curl',
            'vnd.curl.dcurl' => 'dcurl',
            'vnd.curl.scurl' => 'scurl',
            'vnd.curl.mcurl' => 'mcurl',
            'vnd.dvb.subtitle' => 'sub',
            'vnd.fly' => 'fly',
            'vnd.fmi.flexstor' => 'flx',
            'vnd.graphviz' => 'gv',
            'vnd.in3d.3dml' => '3dml',
            'vnd.in3d.spot' => 'spot',
            'vnd.sun.j2me.app-descriptor' => 'jad',
            'vnd.wap.wml' => 'wml',
            'vnd.wap.wmlscript' => 'wmls',
            'x-asm' => ['s','asm'],
            'x-c' => ['c','cc','cxx','cpp','h','hh','dic'],
            'x-fortran' => ['f','for','f77','f90'],
            'x-java-source' => 'java',
            'x-opml' => 'opml',
            'x-pascal' => ['p','pas'],
            'x-nfo' => 'nfo',
            'x-setext' => 'etx',
            'x-sfv' => 'sfv',
            'x-uuencode' => 'uu',
            'x-vcalendar' => 'vcs',
            'x-vcard' => 'vcf',
        ];
    }
}
