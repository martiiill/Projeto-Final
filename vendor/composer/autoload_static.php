<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit406f8e3abfc4d55a91cb5f14f40bbf63
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Phpml' => 
            array (
                0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit406f8e3abfc4d55a91cb5f14f40bbf63::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
