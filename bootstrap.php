<?php

// Ensure the service function does not exist.
if (function_exists('service')) {
    throw new Omatamix\Container\Exception\ContainerException('The `service` function already exists.')
}
