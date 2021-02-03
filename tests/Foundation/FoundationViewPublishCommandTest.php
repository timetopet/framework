<?php

use Mockery as m;

class FoundationViewPublishCommandTest extends \Illuminate\Foundation\Testing\FrameworkTestCase {

	public function tearDown():void
	{
		m::close();
	}


	public function testCommandCallsPublisherWithProperPackageName()
	{
		$command = new Illuminate\Foundation\Console\ViewPublishCommand($pub = m::mock('Illuminate\Foundation\ViewPublisher'));
		$pub->shouldReceive('publishPackage')->once()->with('foo');
		$command->run(new Symfony\Component\Console\Input\ArrayInput(array('package' => 'foo')), new Symfony\Component\Console\Output\NullOutput);
	}

}
