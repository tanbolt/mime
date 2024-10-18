<?php
namespace Tanbolt\Mime\Type;

class Other
{
    public static function mime()
    {
        return [
            'chemical/x-cdx' => 'cdx',
            'chemical/x-cif' => 'cif',
            'chemical/x-cmdf' => 'cmdf',
            'chemical/x-cml' => 'cml',
            'chemical/x-csml' => 'csml',
            'chemical/x-xyz' => 'xyz',
            'message/rfc822' => ['eml','mime'],
            'x-conference/x-cooltalk' => 'ice',
        ];
    }
}
