RicbraRobotsTxtBundle
=====================

After solving the same problem for the fifth time I thought it was time to create a Bundle for this problem. I did again
an extensive search on any other available material but I guess everybody is solving this problem on his own. On
KnpBundles.com and Packagist.org I couldn't find any Bundle for this. So I created this one instead.

### The problem: your staging environment indexed in Google

We all have some different environments for your apps (staging, test, dev) and we all have experienced this in the past:
Google indexed your staging environment and every now and then a real visitor ends up there. Of course you can IP-block
the staging but this isn't always feasible.

### Solution for Symfony2: configurable robots.txt

Update your config.yml:

    ricbra_robots_txt:
        allow_robots: %allow_robots%

In your parameters.yml file for production:

    allow_robots: true

In your staging|dev|test parameters file:

    allow_robots: false

Not really rocket science, but it works.

## Installation

Composer ftw:

    $ composer require ricbra/robots-txt-bundle

Then enable the bundle:

```php
// app/AppKernel.php

$bundles = array(
    ...
    new Ricbra\Bundle\RobotsTxtBundle\RicbraRobotsTxtBundle(),
    ...
);

Update routing:

    // app/config/routing.yml
    ricbra_robots_txt:
        resource: "@RicbraRobotsTxtBundle/Resources/config/routing.yml"
        prefix:   /
