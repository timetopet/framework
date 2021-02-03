<?php

class BcryptHasherTest extends \Illuminate\Foundation\Testing\FrameworkTestCase {

	public function testBasicHashing()
	{
		$hasher = new Illuminate\Hashing\BcryptHasher;
		$value = $hasher->make('password');
		$this->assertNotSame('password', $value);
		$this->assertTrue($hasher->check('password', $value));
		$this->assertTrue(!$hasher->needsRehash($value));
		$this->assertTrue($hasher->needsRehash($value, array('rounds' => 1)));
	}

}
