<?php

// Ensure the service function does not exist.
if (function_exists('service')) {
    throw new Omatamix\Container\Exception\ContainerException('The `service` function already exists.');
}

// Add a service helper.
// MAY return mixed.
function service(string $id)
{
    $instance = Omatamix\Container\StaticContainer::getInstance();
    return $instance->get($id);
}
