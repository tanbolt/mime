<?php
namespace Tanbolt\Mime\Type;

class Model
{
    public static function mime()
    {
        return [
            'iges' => ['igs','iges'],
            'mesh' => ['msh','mesh','silo'],
            'vnd.collada+xml' => 'dae',
            'vnd.dwf' => 'dwf',
            'vnd.gdl' => 'gdl',
            'vnd.gtw' => 'gtw',
            'vnd.mts' => 'mts',
            'vnd.vtu' => 'vtu',
            'vrml' => ['wrl','vrml'],
            'x3d+binary' => ['x3db','x3dbz'],
            'x3d+vrml' => ['x3dv','x3dvz'],
            'x3d+xml' => ['x3d','x3dz'],
        ];
    }
}
