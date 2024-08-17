<?php

namespace SymfonyBundles\RedisBundle\Tests\Fixtures\app;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($environment, $debug);

        (new Filesystem())->remove($this->getCacheDir());
    }

    /**
     * registerBundles.
     *
     * @return object[]
     */
    public function registerBundles(): array
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \SymfonyBundles\RedisBundle\SymfonyBundlesRedisBundle(),
        ];
    }

    public function getRootDir(): string
    {
        return __DIR__;
    }

    public function getCacheDir(): string
    {
        return '/tmp/symfony-cache';
    }

    public function getLogDir(): string
    {
        return '/tmp/symfony-cache';
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        // @phpstan-ignore-next-line
        if (Kernel::VERSION_ID < 53000) {
            $loader->load($this->getRootDir() . '/config/config_test.yml');

            return;
        }

        $loader->load($this->getRootDir() . '/config/config_test_sf6.yml');
    }
}
