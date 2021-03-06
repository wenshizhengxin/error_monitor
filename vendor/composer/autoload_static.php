<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc11623dabdbda02108fd4884130e9d8f
{
    public static $files = array (
        'b6ec61354e97f32c0ae683041c78392a' => __DIR__ . '/..' . '/scrivo/highlight.php/HighlightUtilities/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wenshizhengxin\\error_monitor\\' => 29,
        ),
        'e' => 
        array (
            'epii\\log\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wenshizhengxin\\error_monitor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'epii\\log\\' => 
        array (
            0 => __DIR__ . '/..' . '/epii/log/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'Highlight\\' => 
            array (
                0 => __DIR__ . '/..' . '/scrivo/highlight.php',
            ),
            'HighlightUtilities\\' => 
            array (
                0 => __DIR__ . '/..' . '/scrivo/highlight.php',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc11623dabdbda02108fd4884130e9d8f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc11623dabdbda02108fd4884130e9d8f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitc11623dabdbda02108fd4884130e9d8f::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitc11623dabdbda02108fd4884130e9d8f::$classMap;

        }, null, ClassLoader::class);
    }
}
