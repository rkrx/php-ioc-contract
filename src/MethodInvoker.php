<?php
namespace Ioc;

use Ioc\Exceptions\DefinitionNotFoundException;
use Ioc\Exceptions\Exceptions\ParameterMissingException;

interface MethodInvoker {
	/**
	 * Invokes the callable $callable with the arguments $arguments. If arguments were missing in $arguments, the
	 * method-invoker tries to fill the missing arguments by itself. The provided callable could be a function, a static
	 * method or a class not yet instantiated. The implementation determines how to handle the callable and find the
	 * appropriate method for invocation. If no matching class could be found, it must throw an
	 * Ioc\Exceptions\DefinitionNotFoundException.
	 * 
	 * Following forms must be accepted:
	 * 
	 * $methodInvoker->invoke(function () {}, $arguments);
	 * A closure
	 * 
	 * $methodInvoker->invoke(array($instance, 'methodName'), $arguments);
	 * A classic callable with an already instantiated $instance and a methodName.
	 * 
	 * $methodInvoker->invoke(array('Full\\Qualified\\Class\\Name', 'methodName'), $arguments);
	 * This is not(!) a static call. Full\Qualified\Class\Name gats instantiated first before calling methodName.
	 * 
	 * The called method could have either scalar parameters (with or without default values) or Typehinted patemeters
	 * mixed together. Scalar-types and array-types can not be determined automatically. They must be provided through
	 * $arguments.
	 *
	 * @param callable $callable
	 * @param array $arguments Must be an array were the keys match to the Variable-Names of the __construct'ors parameters.
	 * @throws DefinitionNotFoundException
	 * @throws ParameterMissingException
	 * @return mixed
	 */
	public function invoke($callable, array $arguments = array());
}
