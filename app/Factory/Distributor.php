<?php

namespace App\Factory;

abstract class Distributor
{
    abstract public function makeExecutor();

    public function index()
    {
        $executor = $this->makeExecutor();
        $executor->index();
    }
}