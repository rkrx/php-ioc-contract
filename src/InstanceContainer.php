<?php
namespace Ioc;

use Ioc\Exceptions\DefinitionNotFoundException;

interface InstanceContainer {
	/**
	 * Returns an instance of $className. If no instance of $className exists, it will be created.
	 * If no matching class could be found, it must throw an Ioc\Exceptions\DefinitionNotFoundException.
	 * $className must be an fully qualified class-name.
	 *
	 * @param string $className
	 * @throws DefinitionNotFoundException
	 * @return object
	 */
	public function get($className);
}