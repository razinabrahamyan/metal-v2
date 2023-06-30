<?php

namespace App\Factory\Classes;

use App\Factory\Contracts\Delegate;

class Market implements Delegate
{

    public function index()
    {
        dd(__CLASS__, 'success');
    }
}