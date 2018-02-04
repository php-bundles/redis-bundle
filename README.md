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

Read more about supported client options and connection parameters:

* [Client Options][predis-options-link].
* [Connection Parameters][predis-parameters-link].

How to use
----------
Read more on the page [Quick tour][predis-quick-tour-link].

[package-link]: https://packagist.org/packages/symfony-bundles/redis-bundle
[license-link]: https://github.com/symfony-bundles/redis-bundle/blob/master/LICENSE
[license-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/license
[testing-link]: https://travis-ci.org/symfony-bundles/redis-bundle
[testing-image]: https://travis-ci.org/symfony-bundles/redis-bundle.svg?branch=master
[stable-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/v/stable
[downloads-image]: https://poser.pugx.org/symfony-bundles/redis-bundle/downloads
[sensiolabs-insight-link]: https://insight.sensiolabs.com/projects/406e76e9-6b80-49b1-aab4-4c2abf6627e3
[sensiolabs-insight-image]: https://insight.sensiolabs.com/projects/406e76e9-6b80-49b1-aab4-4c2abf6627e3/big.png
[code-coverage-link]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/?branch=master
[code-coverage-image]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/badges/coverage.png?b=master
[scrutinizer-code-quality-link]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/?branch=master
[scrutinizer-code-quality-image]: https://scrutinizer-ci.com/g/symfony-bundles/redis-bundle/badges/quality-score.png?b=master
[predis-quick-tour-link]: https://github.com/nrk/predis/wiki/Quick-tour
[predis-options-link]: https://github.com/nrk/predis/wiki/Client-Options#list-of-supported-client-options
[predis-parameters-link]: https://github.com/nrk/predis/wiki/Connection-Parameters#connection-parameters
