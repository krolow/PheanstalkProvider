<?php
use Silex\Application;
use Silex\ServiceProviderInterface;    
use Pheanstalk_Pheanstalk;
use Pheanstalk_PheanstalkInterface;

class PheanstalkProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['pheanstalk'] = $app->share(function () use ($app) {
            $server = isset($app['pheanstalk.server']) ? $app['pheanstalk.server'] : '127.0.0.1';
            $port = isset($app['pheanstalk.port']) ? $app['pheanstalk.port'] : Pheanstalk_PheanstalkInterface::DEFAULT_PORT;
            $timeout = isset($app['pheanstalk.timeout']) ? $app['pheanstalk.timeout'] : 2;

            return new Pheanstalk_Pheanstalk($server, $port, $timeout);
        });
    }

    public function boot(Application $app)
    {

    }
}