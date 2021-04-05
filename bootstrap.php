<?php

// Add a service helper `get`.
// @throws \Omatamix\Container\Exception\ContainerException If the instance is null.
// MAY return mixed.
if (function_exists('service_get')) {
    function service_get(string $id)
    {
        $instance = Omatamix\Container\StaticContainer::getInstance();
        return $instance->get($id);
    }
}

// Add a service helper `get`.
// @throws \Omatamix\Container\Exception\ContainerException If the instance is null.
// MUST return bool.
if (function_exists('service_has')) {
    function service_has(string $id)
    {
        $instance = Omatamix\Container\StaticContainer::getInstance();
        return $instance->has($id);
    }
}
