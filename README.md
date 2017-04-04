SymfonyBundlesRedisBundle
=========================

[![SensioLabsInsight][sensiolabs-insight-image]][sensiolabs-insight-link]

[![Build Status][testing-image]][testing-link]
[![Scrutinizer Code Quality][scrutinizer-code-quality-image]][scrutinizer-code-quality-link]
[![Code Coverage][code-coverage-image]][code-coverage-link]
[![Total Downloads][downloads-image]][package-link]
[![Latest Stable Version][stable-image]][package-link]
[![License][license-image]][license-link]

Installation
------------
* Require the bundle with composer:

``` bash
composer require symfony-bundles/redis-bundle
```

* Enable the bundle in the kernel:

``` php
public function registerBundles()
{
    $bundles = [
        // ...
        new SymfonyBundles\RedisBundle\SymfonyBundlesRedisBundle(),
        // ...
    ];
    ...
}
```

* Configure the redis bundle in your config.yml.

Defaults configuration:
``` yml
sb_redis:
    class:
        client:  "SymfonyBundles\RedisBundle\Service\Client"
        factory: "SymfonyBundles\RedisBundle\Service\Factory"
    clients:
        default:
            # container alias for service, defaults name for this client: sb_redis.client.default
            alias:      ~
            # client options
            options:    []
            # connection parameters
            parameters: []
```

Read more about supported client options and connection parameters:

* [Client Options][predis-options-link].
* [Connection Parameters][predis-parameters-link].

How to use
----------
Read more on page [Quick tour][predis-quick-tour-link].

[package-link]: https://packagist.org/packages/symfony-bundles/redis-bundle
[license-link]: https://github.com/symfony-bundles/redis-bundle/blob/master/LICENSE
[license-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/license
[testing-link]: https://travis-ci.org/symfony-bundles/redis-bundle
[testing-image]: https://travis-ci.org/symfony-bundles/redis-bundle.svg?branch=master
[stable-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/v/stable
[downloads-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/downloads
[sensiolabs-insight-link]: https://insight.sensiolabs.com/projects/6b338d1f-7977-41ab-b0e1-60c4de726662
[sensiolabs-insight-image]: https://insight.sensiolabs.com/projects/6b338d1f-7977-41ab-b0e1-60c4de726662/big.png
[code-coverage-link]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/?branch=master
[code-coverage-image]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/badges/coverage.png?b=master
[scrutinizer-code-quality-link]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/?branch=master
[scrutinizer-code-quality-image]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/badges/quality-score.png?b=master
[predis-quick-tour-link]: https://github.com/nrk/predis/wiki/Quick-tour
[predis-options-link]: https://github.com/nrk/predis/wiki/Client-Options#list-of-supported-client-options
[predis-parameters-link]: https://github.com/nrk/predis/wiki/Connection-Parameters#connection-parameters
