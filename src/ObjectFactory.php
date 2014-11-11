<?php
namespace Ioc;

interface ObjectFactory {
	/**
	 * The object-factory creates a class with the name $className and the __construct-arguments $arguments. If
	 * arguments were missing in $arguments, the method-invoker tries to fill the missing arguments by itself.
	 *
	 * @param string $className
	 * @param array $arguments
	 * @return mixed
	 */
	public function create($className, array $arguments = array());
}