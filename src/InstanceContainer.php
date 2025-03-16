<?php
namespace Ioc;

use Ioc\Exceptions\DefinitionNotFoundException;

interface InstanceContainer {
	/**
	 * Returns an instance of $className. If no instance of $className exists, it will be created.
	 * If no matching class could be found, it must throw an Ioc\Exceptions\DefinitionNotFoundException.
	 * $className must be an fully qualified class-name.
	 *
	 * @template T of object
	 * @param class-string<T> $className
	 * @throws DefinitionNotFoundException
	 * @return T
	 */
	public function get(string $className);
}