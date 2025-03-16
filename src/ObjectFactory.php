<?php
namespace Ioc;

use Ioc\Exceptions\DefinitionNotFoundException;
use Ioc\Exceptions\MissingParameterException;

interface ObjectFactory {
	/**
	 * The object-factory creates a class with the name $className and the __construct-arguments $arguments. If
	 * arguments were missing in $arguments, the method-invoker tries to fill the missing arguments by itself.
	 * If no matching class could be found, it must throw an Ioc\Exceptions\DefinitionNotFoundException.
	 *
	 * @template T of object
	 * @param class-string<T> $className Must be an fully qualified class-name.
	 * @param list<mixed> $arguments Must be an array were the keys match to the Variable-Names of the __construct'ors parameters.
	 * @return T
	 * @throws MissingParameterException
	 * @throws DefinitionNotFoundException
	 */
	public function create(string $className, array $arguments = []);
}
