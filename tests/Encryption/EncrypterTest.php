<?php

use Illuminate\Encryption\Encrypter;

/**
 * Class EncrypterTest
 * Modified by TimeToPet. Tests borrowed from https://github.com/neoxia/laravel-openssl-encryption
 */
class EncrypterTest extends PHPUnit_Framework_TestCase {

	public function testEncryption()
	{
		$e = $this->getEncrypter();
		$this->assertNotEquals('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', $e->encrypt('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'));
		$encrypted = $e->encrypt('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
		$this->assertEquals('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', $e->decrypt($encrypted));
	}


	public function testEncryptionWithCustomCipher()
	{
		$e = $this->getEncrypter();
		$e->setCipher('aes-128');
		$this->assertNotEquals('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', $e->encrypt('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'));
		$encrypted = $e->encrypt('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
		$this->assertEquals('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', $e->decrypt($encrypted));
	}

    /**
     * @expectedException Illuminate\Encryption\DecryptException
     */
    public function testExceptionThrownWhenPayloadIsInvalid()
    {
        $e = $this->getEncrypter();
        $payload = $e->encrypt('foo');
        $payload .= 'adslkadlf';
        $e->decrypt($payload);
    }

    /**
     * @expectedException Illuminate\Encryption\DecryptException
     */
    public function testExceptionThrownWhenValueIsInvalid()
    {
        $e = $this->getEncrypter();
        $payload = $e->encrypt('foo');
        $payload .= 'adlkasdf';
        $e->decrypt($payload);
    }



    protected function getEncrypter()
	{
		return new Encrypter(str_repeat('a', 32));
	}

}
