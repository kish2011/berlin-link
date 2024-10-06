<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1b6515ff4d10c5f389710743f71798ab
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BerlinDB\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BerlinDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/berlindb/core/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1b6515ff4d10c5f389710743f71798ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1b6515ff4d10c5f389710743f71798ab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1b6515ff4d10c5f389710743f71798ab::$classMap;

        }, null, ClassLoader::class);
    }
}
