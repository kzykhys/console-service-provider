ConsoleServiceProvider
======================

Parameters
----------

*   **console.options** (optional): Array of Options

    These options are available:

    * **name**: The name of application (Symfony\Component\Console\Application::setName())
    * **version**: The version of application (Symfony\Component\Console\Application::setVersion())

*   **console.commands** (optional): Array of command (instance of `Symfony/Console/Command`)

Services
--------

* **console**: instance of `Symfony\Component\Console\Application`

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

use KzykHys\Silex\Provider\Console\ConsoleServiceProvider;

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

Accessing "$app" in your command
--------------------------------

``` php
<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class YourCommand extends Command
{

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var \Silex\Application $app */
        $app = $this->getHelper('silex')->getApplication();
    }

}
```

See Also
--------

*   [KzykHys/DoctrineORMServiceProvider](https://github.com/kzykhys/doctrine-orm-service-provider)
    Provides DoctrineORM to Silex application (and Doctrine Commands)

*   [KzykHys/SilexDistribution](https://github.com/kzykhys/silex-distribution)
    Configured set of Silex

License
-------

The MIT License