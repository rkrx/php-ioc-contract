<?php
namespace Ioc;

use Ioc\Exceptions\DefinitionNotFoundException;

interface ObjectFactory {
	/**
	 * The object-factory creates a class with the name $className and the __construct-arguments $arguments. If
	 * arguments were missing in $arguments, the method-invoker tries to fill the missing arguments by itself.
	 * If no matching class could be found, it must throw an Ioc\Exceptions\DefinitionNotFoundException.
	 *
	 * @param string $className Must be an fully qualified class-name.
	 * @param array $arguments Must be an array were the keys match to the Variable-Names of the __construct'ors parameters.
	 * @throws DefinitionNotFoundException
	 * @return mixed
	 */
	public function create($className, array $arguments = array());
}