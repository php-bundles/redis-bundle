<?php

namespace SymfonyBundles\RedisBundle\Tests;

class Kernel
{
    /**
     * @var Fixtures\app\AppKernel
     */
    private static $instance;

    /**
     * @return Fixtures\app\AppKernel
     */
    public static function make(): Fixtures\app\AppKernel
    {
        if (null === self::$instance) {
            self::$instance = new Fixtures\app\AppKernel('test', true);

            self::$instance->boot();
        }

        return self::$instance;
    }
}
