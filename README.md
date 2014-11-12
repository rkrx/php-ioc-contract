php-ioc-contract
================

A contract for ioc-containers

**Do not use this library as long it is not 1.0.**

## Abstract

This project provides a documentation for the api and the behavior of three different concerns:

* ObjectFactory - an abstract factory to somehow create new object-instances from.
* InstanceContainer - a container that returns instances that were associated to a key.
* MethodInvoker - invoke a method, function or closure.


## Motivation

Lets say you wan't to build a rule-based service-dispatcher (or an http-router like silex), that invoke registered closures only if a certain condition is met:

```PHP
$sserviceDispatcher = new ServiceDispatcher();
$sserviceDispatcher->register('service-name', 3600 /* timeout sek. */, function () {
	/* do something every hour */
});
$sserviceDispatcher->run();
```

It would be fun, if I already had the domain-objects I need to work with. This would look like this:

```PHP
$sserviceDispatcher = new ServiceDispatcher();
$sserviceDispatcher->register('service-name', 3600 /* timeout sek. */, function (BusinessObject $businessObject) {
	/* do something every hour */
	$businessObject->doSomething();
});
$sserviceDispatcher->run();
```

`$sserviceDispatcher` should not be aware of a `BusinessObject` directly. But the `ServiceDispatcher` may know of an generic way to call a `callable` (like a `closure`) and resolve those parameters by a component outside of `ServiceDispatcher`'s scope. How this is archived is not a concern of the `ServiceDispatcher`. It just happens somehow.

The goal could be archived with an Dependency-Injection-Container. There are different ioc-containers out there with quite different interfaces *(my current favorite is [PHP-DI](http://php-di.org/))*. So we need a common interface to pass an instance around which is aware of how to instantiate our domain-objects so that we could directly use them:
 
```PHP
$container = new Container(require 'config/di-cfg.php');
$sserviceDispatcher = new ServiceDispatcher($container);
$sserviceDispatcher->register('service-name', 3600 /* timeout sek. */, function (BusinessObject $businessObject) {
	/* do something every hour */
	$businessObject->doSomething();
});
$sserviceDispatcher->run();
```

Now the run-method in the `ServiceDispatcher`-implementation could simply look like this:

```PHP
<?php
use Ioc\MethodInvoker;

class ServiceDispatcher {
	/** @var MethodInvoker */
	private $methodInvoker;

	/* ... */

	/** @param MethodInvoker $methodInvoker */
	public function __construct(MethodInvoker $methodInvoker) {
		$this->methodInvoker = $methodInvoker;
	}

	/* ... */

	public function run() {
		foreach($this->registry as $serviceName => $service) {
			if($service['lockUntil'] > time()) {
				continue;
			}
			try {
				$this->methodInvoker->invoke($service['fn'], array('serviceName' => $serviceName));
			} finally {
				$service['lockUntil'] = time() + $service['timeout'];
			}
		}
	}
}
```

### ObjectFactory

A `ObjectFactory` is mostly useful in common factories to create entities.

### InstanceContainer

A `InstanceContainer` is mostly useful when in subjection to a di-container only a single instance of an object should be used. This is slightly different to the use of a singleton-pattern since you can have multiple di-containers with different configurations that may inject different implementations for 

### MethodInvoker

Invokes a `callable` method, function or closure and resolve the required parameters automatically of not already
provided. Here is a 