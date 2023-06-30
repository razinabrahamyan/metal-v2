<?php

namespace App\Library\Admin\Contracts;

interface AdminPriceContract
{
    public function index();
    public function update($id, $data);
}
