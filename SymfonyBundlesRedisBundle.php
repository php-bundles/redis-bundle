<?php

namespace SymfonyBundles\RedisBundle;

use SymfonyBundles\RedisBundle\DependencyInjection\RedisExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SymfonyBundlesRedisBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension(): ?RedisExtension
    {
        return new RedisExtension();
    }
}
