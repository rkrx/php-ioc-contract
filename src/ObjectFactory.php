<?php
namespace Ioc;

interface ObjectFactory {
	/**
	 * The object-factory creates a class with the name $className and the __construct-arguments $arguments. If
	 * arguments were missing in $arguments, the method-invoker tries to fill the missing arguments by itself.
	 * If no matching class could be found, it must throw an Ioc\Exceptions\DefinitionNotFoundException.
	 *
	 * @param string $className
	 * @param array $arguments
	 * @return mixed
	 */
	public function create($className, array $arguments = array());
}