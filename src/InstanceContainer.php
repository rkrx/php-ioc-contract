<?php
namespace Ioc;

interface InstanceContainer {
	/**
	 * Returns an instance of $className. Is no instance of $className exists, it will be created.
	 *
	 * @param string $className
	 * @return object
	 */
	public function get($className);
}