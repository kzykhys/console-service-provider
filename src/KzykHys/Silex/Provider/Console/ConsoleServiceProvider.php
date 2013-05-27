<?php

namespace KzykHys\Silex\Provider\Console;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Provides Symfony/Console
 *
 * @author Kazuyuki Hayashi <hayashi@valnur.net>
 */
class ConsoleServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
        $app['console.commands'] = $app->share(function () {
            return array();
        });

        $app['console'] = $app->share(function (Application $app) {
            $console = new \Symfony\Component\Console\Application($app['project.name'], $app['project.version']);
            $console->addCommands($app['console.commands']);

            return $console;
        });
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registers
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
    }

}