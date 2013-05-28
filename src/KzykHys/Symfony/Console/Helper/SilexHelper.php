<?php

namespace KzykHys\Symfony\Console\Helper;

use Silex\Application;
use Symfony\Component\Console\Helper\Helper;

class SilexHelper extends Helper
{

    /**
     * @var \Silex\Application
     */
    private $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->app;
    }

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     *
     * @api
     */
    public function getName()
    {
        return 'silex';
    }

}