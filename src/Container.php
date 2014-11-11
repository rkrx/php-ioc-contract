<?php
namespace Ioc;

/**
 * Combines all interfaces
 */
interface Container extends ObjectFactory, InstanceContainer, MethodInvoker {
}