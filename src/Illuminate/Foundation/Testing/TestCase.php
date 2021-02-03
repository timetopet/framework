<?php namespace Illuminate\Foundation\Testing;

abstract class TestCase extends FrameworkTestCase
{

    use ApplicationTrait, AssertionsTrait;

    /**
     * Setup the test environment.
     * @return void
     */
    public function setUp(): void
    {
        if (!$this->app)
        {
            $this->refreshApplication();
        }
    }

    /**
     * Creates the application.
     * Needs to be implemented by subclasses.
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    abstract public function createApplication();

    /**
     * This stub wraps functionality that used to exist in PHPUNIT 4.*
     * Returns a mock object for the specified class.
     * @param string $originalClassName Name of the class to mock.
     * @param array|null $methods When provided, only methods whose names are in the array
     *                                            are replaced with a configurable test double. The behavior
     *                                            of the other methods is not changed.
     *                                            Providing null means that no methods will be replaced.
     * @param array $arguments Parameters to pass to the original class' constructor.
     * @param string $mockClassName Class name for the generated test double class.
     * @param bool $callOriginalConstructor Can be used to disable the call to the original class' constructor.
     * @param bool $callOriginalClone Can be used to disable the call to the original class' clone constructor.
     * @param bool $callAutoload Can be used to disable __autoload() during the generation of the test double class.
     * @param bool $cloneArguments
     * @param bool $callOriginalMethods
     * @param object $proxyTarget
     * @return \PHPUnit\Framework\MockObject\MockObject
     * @since  Method available since Release 3.0.0
     */
    public function getMock(string $originalClassName, $methods = array(), array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false, $callOriginalMethods = false, $proxyTarget = null): \PHPUnit\Framework\MockObject\MockObject
    {
        $builder = $this->getMockBuilder($originalClassName);
        if (count($methods) > 0)
        {
            $builder->onlyMethods($arguments);
        }
        if (count($arguments) > 0)
        {
            $builder->setConstructorArgs($arguments);
        }
        if (!empty($mockClassName))
        {
            $builder->setMockClassName($mockClassName);
        }
        $callOriginalConstructor ? $builder->enableOriginalConstructor() : $builder->disableOriginalConstructor();
        $callOriginalClone ? $builder->enableOriginalClone() : $builder->disableOriginalClone();
        $callAutoload ? $builder->enableAutoload() : $builder->disableAutoload();
        $cloneArguments ? $builder->enableArgumentCloning() : $builder->disableArgumentCloning();
        $callOriginalMethods ? $builder->enableProxyingToOriginalMethods() : $builder->disableProxyingToOriginalMethods();
        if (isset($proxyTarget))
        {
            $builder->setProxyTarget($proxyTarget);
        }
        return $builder->getMock();

    }

}
