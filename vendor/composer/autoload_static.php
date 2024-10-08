<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf5c0deee37723b1ca7444706a0ef8c38
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nijwel\\ImageUpload\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nijwel\\ImageUpload\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf5c0deee37723b1ca7444706a0ef8c38::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf5c0deee37723b1ca7444706a0ef8c38::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf5c0deee37723b1ca7444706a0ef8c38::$classMap;

        }, null, ClassLoader::class);
    }
}
