<?php

namespace App\Classes\Bitrix24\Forms\Crms;

use App\Bitrix24\Bitrix24API;
use Illuminate\Support\Facades\Storage;

class BaseCrm implements FormIntegrationInterface
{
    const TEST_WEBHOOK = 'https://b24-bg29ul.bitrix24.ru/rest/1/84rsj20mho3yvcnb/';
    const WEBHOOK = 'https://sagamet.bitrix24.ru/rest/1/t1o1dkd1xekjjz9s/';
    const WORKERS = [144, 408];

    private $params;

    /**
     * TestCrm constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function prepareParams() : array
    {
        if (!empty($this->params['chooseFile'])) {
            $image[] = 'https://metallolom-24.ru'.Storage::url(Storage::put('public/form/images', $this->params['chooseFile']));
        }

        return [
            'SOURCE_ID'            => 'WEB',
            'TITLE'                => 'Заявка с сайта Металлолом-24 - '.$this->params['page'] ?? 'Заявка с сайта Металлолом-24',
            'NAME'                 => $this->params['full_name'] ?? 'Посетитель сайта Металлолом-24',
            'ASSIGNED_BY_ID'       => self::WORKERS[rand(0, count(self::WORKERS) - 1)],
            "PHONE"                => [
                [
                    "VALUE"      => $this->params['phone'],
                    "VALUE_TYPE" => "WORK"
                ]
            ],

//            'UF_CRM_1591619851703' => $this->params['weight'] ?? '',//$leadData['VES'],
            'UF_CRM_1599632058192' => $this->params['link'] ?? '',
            'UF_CRM_1588071629'    => $this->params['weight'] ?? '',// Вес
            'UF_CRM_1591640810'    => $this->params['metaltype2'] ?? '',// Тип металла
            'UF_CRM_1589284613852' => ($this->params['city'] ?? ''),
            'UF_CRM_1591627302852' => (!empty($image)) ? $image : [],
            'UF_CRM_1595918738176' => (!empty($this->params['demontazh']) ? 'Демонтаж: '.$this->params['demontazh'].'. ' : '').(!empty($this->params['delivery']) ? 'Вывоз: '.$this->params['delivery'].'.' : ''),
        ];
    }

    /**
     * @return int
     */
    public function addLead()
    {
        $webhook = (config('app.env') == 'local') ? self::TEST_WEBHOOK : self::WEBHOOK;
        return (new Bitrix24API($webhook))->addLead($this->prepareParams());
    }
}
