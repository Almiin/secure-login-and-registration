<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite363d7f32ce17e18d36b81ee4539cf5d
{
    public static $files = array (
<<<<<<< HEAD
<<<<<<< HEAD
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        'a4ecaeafb8cfb009ad0e052c90355e98' => __DIR__ . '/..' . '/beberlei/assert/lib/Assert/functions.php',
        'fc73bab8d04e21bcdda37ca319c63800' => __DIR__ . '/..' . '/mikecao/flight/flight/autoload.php',
        '5b7d984aab5ae919d3362ad9588977eb' => __DIR__ . '/..' . '/mikecao/flight/flight/Flight.php',
        '0ccdf99b8f62f02c52cba55802e0c2e7' => __DIR__ . '/..' . '/zircote/swagger-php/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\Finder\\' => 25,
        ),
=======
        'a4ecaeafb8cfb009ad0e052c90355e98' => __DIR__ . '/..' . '/beberlei/assert/lib/Assert/functions.php',
        'fc73bab8d04e21bcdda37ca319c63800' => __DIR__ . '/..' . '/mikecao/flight/flight/autoload.php',
        '5b7d984aab5ae919d3362ad9588977eb' => __DIR__ . '/..' . '/mikecao/flight/flight/Flight.php',
    );

    public static $prefixLengthsPsr4 = array (
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
        'a4ecaeafb8cfb009ad0e052c90355e98' => __DIR__ . '/..' . '/beberlei/assert/lib/Assert/functions.php',
        'fc73bab8d04e21bcdda37ca319c63800' => __DIR__ . '/..' . '/mikecao/flight/flight/autoload.php',
        '5b7d984aab5ae919d3362ad9588977eb' => __DIR__ . '/..' . '/mikecao/flight/flight/Flight.php',
    );

    public static $prefixLengthsPsr4 = array (
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
        'P' => 
        array (
            'ParagonIE\\ConstantTime\\' => 23,
        ),
        'O' => 
        array (
<<<<<<< HEAD
<<<<<<< HEAD
            'OpenApi\\' => 8,
            'OTPHP\\' => 6,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Annotations\\' => 28,
        ),
=======
            'OTPHP\\' => 6,
        ),
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
            'OTPHP\\' => 6,
        ),
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
        'A' => 
        array (
            'Assert\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
<<<<<<< HEAD
<<<<<<< HEAD
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
        'ParagonIE\\ConstantTime\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/constant_time_encoding/src',
        ),
<<<<<<< HEAD
<<<<<<< HEAD
        'OpenApi\\' => 
        array (
            0 => __DIR__ . '/..' . '/zircote/swagger-php/src',
        ),
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
        'OTPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/spomky-labs/otphp/src',
        ),
<<<<<<< HEAD
<<<<<<< HEAD
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
        'Assert\\' => 
        array (
            0 => __DIR__ . '/..' . '/beberlei/assert/lib/Assert',
        ),
    );

<<<<<<< HEAD
<<<<<<< HEAD
    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
        ),
    );

=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite363d7f32ce17e18d36b81ee4539cf5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite363d7f32ce17e18d36b81ee4539cf5d::$prefixDirsPsr4;
<<<<<<< HEAD
<<<<<<< HEAD
            $loader->prefixesPsr0 = ComposerStaticInite363d7f32ce17e18d36b81ee4539cf5d::$prefixesPsr0;
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e

        }, null, ClassLoader::class);
    }
}
