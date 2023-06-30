<?php

namespace App\Library\Admin\Contracts;

interface KeyWordContract
{
    public function index();
    public function update($id, $data);
}