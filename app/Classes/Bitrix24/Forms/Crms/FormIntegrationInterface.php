<?php

namespace App\Classes\Bitrix24\Forms\Crms;

interface FormIntegrationInterface
{
    public function addLead();

    public function prepareParams();
}
