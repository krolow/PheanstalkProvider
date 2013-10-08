<?php
namespace Test\Cobaia\Pheanstalk\Provider\Silex;

use Silex\Application;
use Cobaia\Pheanstalk\Provider\Silex\PheanstalkProvider;

class PheanstalkProviderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->provider = new PheanstalkProvider();
    }

    public function testRegister()
    {
        $app = new Application();

        $app->register(new PheanstalkProvider(), array(
            'pheanstalk.server' => '127.0.0.1',
        ));
        $this->assertInstanceOf('Pheanstalk_PheanstalkInterface', $app['pheanstalk']);        
    }
}