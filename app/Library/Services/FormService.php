<?php

namespace App\Library\Services;

use App\Classes\Bitrix24\Forms\Crms\BaseCrm;
use App\Library\Services\Contracts\FormContract;

class FormService implements FormContract
{
    public function sendForm($request)
    {
        return (new BaseCrm($request->all()))->addLead();
    }
}
