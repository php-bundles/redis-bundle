SymfonyBundlesRedisBundle
=========================

[![Build][master Build Status Image]][master Build Status]
[![Code Coverage][code-coverage-image]][code-coverage-link]
[![Total Downloads][downloads-image]][package-link]
[![Latest Stable Version][stable-image]][package-link]
[![License][license-image]][license-link]

Installation
------------
* Require the bundle with composer:

``` bash
composer req symfony-bundles/redis-bundle
```

Configuring of the clients
--------------------------
If you want configure Redis clients - create configuration file. For example:
``` yml
# config/packages/sb_redis.yaml
sb_redis:
    clients:
        default:
            $options:    []
            $parameters: ['tcp://127.0.0.1:6379?database=3']

```

If you want configure Redis clients Sentinel:
``` yml
# config/packages/sb_redis.yaml
sb_redis:
    clients:
        default:
            $options:
              replication: 'sentinel’
              service: 'mymaster'
              parameters:
                database: '3'
            $parameters: ['%env(REDIS_URL)%', '%env(REDIS_URL)%']

```

Read more about supported client options and connection parameters:

* [Client Options][predis-options-link].
* [Connection Parameters][predis-parameters-link].

How to use
----------
Read more on the page [Quick tour][predis-quick-tour-link].

[package-link]: https://packagist.org/packages/symfony-bundles/redis-bundle
[license-link]: https://github.com/symfony-bundles/redis-bundle/blob/master/LICENSE
[license-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/license
[stable-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/v/stable
[downloads-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/downloads
[predis-quick-tour-link]: https://github.com/nrk/predis/wiki/Quick-tour
[predis-options-link]: https://github.com/nrk/predis/wiki/Client-Options#list-of-supported-client-options
[predis-parameters-link]: https://github.com/nrk/predis/wiki/Connection-Parameters#connection-parameters
[master Build Status]: https://github.com/symfony-bundles/redis-bundle/actions?query=workflow%3ASymfony+branch%3Amaster
[master Build Status Image]: https://github.com/symfony-bundles/redis-bundle/workflows/Symfony/badge.svg?branch=master
[master Code Coverage]: https://codecov.io/gh/symfony-bundles/redis-bundle/branch/master
[master Code Coverage Image]: https://img.shields.io/codecov/c/github/symfony-bundles/redis-bundle/master?logo=codecov
