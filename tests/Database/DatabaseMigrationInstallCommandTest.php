<?php

use Mockery as m;

class DatabaseMigrationInstallCommandTest extends \Illuminate\Foundation\Testing\FrameworkTestCase {

	public function tearDown():void
	{
		m::close();
	}


	public function testFireCallsRepositoryToInstall()
	{
		$command = new Illuminate\Database\Console\Migrations\InstallCommand($repo = m::mock('Illuminate\Database\Migrations\MigrationRepositoryInterface'));
		$repo->shouldReceive('setSource')->once()->with('foo');
		$repo->shouldReceive('createRepository')->once();

		$this->runCommand($command, array('--database' => 'foo'));
	}


	protected function runCommand($command, $options = array())
	{
		return $command->run(new Symfony\Component\Console\Input\ArrayInput($options), new Symfony\Component\Console\Output\NullOutput);
	}

}
