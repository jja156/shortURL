<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96eb69b94e22601919861f063cd77caf
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit96eb69b94e22601919861f063cd77caf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96eb69b94e22601919861f063cd77caf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit96eb69b94e22601919861f063cd77caf::$classMap;

        }, null, ClassLoader::class);
    }
}
