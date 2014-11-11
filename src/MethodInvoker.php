<?php
namespace Ioc;

interface MethodInvoker {
	/**
	 * Invokes the callable $callable with the arguments $arguments. If arguments were missing in $arguments, the
	 * method-invoker tries to fill the missing arguments by itself.
	 *
	 * @param $callable
	 * @param array $arguments
	 * @return mixed
	 */
	public function invoke($callable, array $arguments = array());
}