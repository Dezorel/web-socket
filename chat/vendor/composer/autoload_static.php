<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe8eeed35232fce345a05222a64c1a4b
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitbe8eeed35232fce345a05222a64c1a4b::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitbe8eeed35232fce345a05222a64c1a4b::$classMap;

        }, null, ClassLoader::class);
    }
}
