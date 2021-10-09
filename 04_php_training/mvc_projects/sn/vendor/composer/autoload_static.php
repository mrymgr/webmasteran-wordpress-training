<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e96a9cfdbe93d18fdfa748000e82066
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/system',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'System\\Router\\Api\\Route' => __DIR__ . '/../..' . '/system/Router/Api/Route.php',
        'System\\Router\\Web\\Route' => __DIR__ . '/../..' . '/system/Router/Web/Route.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e96a9cfdbe93d18fdfa748000e82066::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e96a9cfdbe93d18fdfa748000e82066::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3e96a9cfdbe93d18fdfa748000e82066::$classMap;

        }, null, ClassLoader::class);
    }
}
