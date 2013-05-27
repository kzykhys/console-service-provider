ConsoleServiceProvider
======================

Parameters
----------

* **console.commands** (optional): Array of command (instance of `Symfony/Console/Command`)

Services
--------

* **console**: instance of `Symfony/Console/Application`

Usage
-----

app/bootstrap.php

``` php
<?php

use KzykHys\Silex\Provider\Console\ConsoleServiceProvider;

$app = new \Silex\Appliation();

return $app;
```

app/console.php

``` php
<?php

$app = require __DIR__ . '/bootstrap.php';

$app->register(new ConsoleServiceProvider());

$app['console.commands'] = $app->share($app->extend('console.commands', function (array $commands) {
    $commands[] = new YourCommand();

    return $commands;
}));

$app->boot();
$app['console']->run();
```

```
$ php app/console.php
```