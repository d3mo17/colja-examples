<?php

namespace App\GraphQL;

use DMo\Colja\GraphQL\AbstractResolver;

class DemoResolver extends AbstractResolver
{
    public function demo(array $root = null, array $args): string
    {
        return "Hello World!";
    }

    public function demoWithArguments(array $root = null, array $args): string
    {
        $num = array_key_exists('num', $args) ? $args['num'] : 17;
        return "Hello ${args['name']}. The magic number is $num!";
    }
}
