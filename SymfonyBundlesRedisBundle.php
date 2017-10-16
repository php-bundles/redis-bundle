<?php

namespace SymfonyBundles\RedisBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SymfonyBundlesRedisBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new DependencyInjection\RedisExtension();
    }
}
