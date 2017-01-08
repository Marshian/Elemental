<?php
/**
 * TestCase.php
 *
 * Author: ryan
 * Date:   10/25/16
 * Time:   11:10 PM
 */

namespace Humweb\Modules;

class TestCase extends Orchestra\Testbench\TestCase {

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

}