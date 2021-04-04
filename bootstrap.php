<?php

// Ensure the service function does not exist.
if (function_exists('service_get') || function_exists('service_has')) {
    throw new Omatamix\Container\Exception\ContainerException('The `service_get` or `service_has` function already exists.');
}

// Add a service helper `get`.
// @throws \Omatamix\Container\Exception\ContainerException If the instance is null.
// MAY return mixed.
function service_get(string $id)
{
    $instance = Omatamix\Container\StaticContainer::getInstance();
    return $instance->get($id);
}

// Add a service helper `get`.
// @throws \Omatamix\Container\Exception\ContainerException If the instance is null.
// MUST return bool.
function service_has(string $id)
{
    $instance = Omatamix\Container\StaticContainer::getInstance();
    return $instance->has($id);
}
