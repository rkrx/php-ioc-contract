<?php
namespace Ioc;

use Ioc\Exceptions\DefinitionNotFoundException;

interface InstanceContainer {
	/**
	 * Returns an instance of $className. Is no instance of $className exists, it will be created.
	 * If no matching class could be found, it must throw an Ioc\Exceptions\DefinitionNotFoundException.
	 *
	 * @param string $className
	 * @throws DefinitionNotFoundException
	 * @return object
	 */
	public function get($className);
}