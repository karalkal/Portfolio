<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit932e0e2636eb4a808e631a328c799371
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit932e0e2636eb4a808e631a328c799371::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit932e0e2636eb4a808e631a328c799371::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit932e0e2636eb4a808e631a328c799371::$classMap;

        }, null, ClassLoader::class);
    }
}
