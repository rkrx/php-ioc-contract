<?php
namespace Ioc;

interface MethodInvoker {
	/**
	 * Invokes the callable $callable with the arguments $arguments. If arguments were missing in $arguments, the
	 * method-invoker tries to fill the missing arguments by itself. The provided callable could be a function, a static
	 * method or a class not yet instantiated. The implementation determines how to handle the callable and find the
	 * appropriate method for invocation. If no matching class could be found, it must throw an
	 * Ioc\Exceptions\DefinitionNotFoundException.
	 *
	 * @param callable $callable
	 * @param array $arguments
	 * @return mixed
	 */
	public function invoke($callable, array $arguments = array());
}