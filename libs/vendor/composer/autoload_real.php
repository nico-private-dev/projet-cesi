<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3c77ed7099b3246f8e9fec43d6df0479
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit3c77ed7099b3246f8e9fec43d6df0479', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3c77ed7099b3246f8e9fec43d6df0479', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3c77ed7099b3246f8e9fec43d6df0479::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
