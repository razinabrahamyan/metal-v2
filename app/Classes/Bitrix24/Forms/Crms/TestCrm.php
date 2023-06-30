<?php

namespace App\Classes\Bitrix24\Forms\Crms;

use App\Bitrix24\Bitrix24API;

class TestCrm implements FormIntegrationInterface
{
    //https://sagamet.bitrix24.ru/rest/1/t1o1dkd1xekjjz9s/
    const WEBHOOK = 'https://b24-bg29ul.bitrix24.ru/rest/1/84rsj20mho3yvcnb/';
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

    public function prepareParams() : array
    {
        return [
            'SOURCE_ID' => 'WEB',
            'TITLE'     => 'Металлолом-24 - '.$this->params['page'] ?? 'Заявка с сайта Металлолом-24',
            'NAME'      => $this->params['full_name'] ?? 'Посетитель сайта Металлолом-24',
            'ASSIGNED_BY_ID' => self::WORKERS[rand(0, count(self::WORKERS) - 1)],
            "PHONE"     => [
                [
                    "VALUE"      => $this->params['phone'],
                    "VALUE_TYPE" => "WORK"
                ]
            ],
//            'UF_CRM_1591619851703' => ($_POST['metaltype2'] ? $_POST['weight'] / 1000 : $_POST['weight']),//$leadData['VES'],
//            'UF_CRM_1588071629'    => ($_POST['metaltype1'] ? $_POST['weight'] : '').($_POST['metaltype2'] ? $_POST['weight'] / 1000 : ''),//только для квиза вес в тоннах
//            'UF_CRM_1591640810'    => ($_POST['metalvid'] ? $_POST['metalvid'].' ' : '').($_POST['metaltype1'] ? $_POST['metaltype1'].' ' : '').($_POST['metaltype2'] ? $_POST['metaltype2'].' ' : ''),
//            'UF_CRM_1589284613852' => ($_POST['city'] ? $_POST['city'] : ''),
//            'UF_CRM_1595918738176' => ($_POST['demontazh'] ? 'Демонтаж: '.$_POST['demontazh'].'. ' : '').($_POST['delivery'] ? 'Вывоз: '.$_POST['delivery'] : ''),
        ];
    }

    public function addLead()
    {
        return (new Bitrix24API(self::WEBHOOK))->addLead($this->prepareParams());
    }
}

// CRM server conection data
define('CRM_HOST', 'sagamet.bitrix24.ru'); // your CRM domain name
define('CRM_PORT', '443'); // CRM server port
define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path

// CRM server authorization data
define('CRM_LOGIN', '+79254286177'); // login of a CRM user able to manage leads
define('CRM_PASSWORD', 'JSdeiwcn2314!+21'); // password of a CRM user
// OR you can send special authorization hash which is sent by server after first successful connection with login and password
//define('CRM_AUTH', 'e54ec19f0c5f092ea11145b80f465e1a'); // authorization hash

/********************************************************************************************/

$workers = [144, 408];

// POST processing
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $leadData = $_POST['DATA'];

    if (!isset($arrNewNames)) $arrNewNames = [];
    $workerid = $workers[rand(0, count($workers) - 1)];

    // get lead data from the form
    $postData = array(
        'SOURCE_ID'            => 'WEB',
        'TITLE'                => $_subject,
        'NAME'                 => ($_POST['metalvid'] || $_POST['name'] ? $_POST['name'] : 'Посетитель сайта sagamet.ru'),
        'ASSIGNED_BY_ID'       => $workerid,
        'PHONE_WORK'           => $_POST['phone'],
        'UF_CRM_1591619851703' => ($_POST['metaltype2'] ? $_POST['weight'] / 1000 : $_POST['weight']),//$leadData['VES'],
        'UF_CRM_1588071629'    => ($_POST['metaltype1'] ? $_POST['weight'] : '').($_POST['metaltype2'] ? $_POST['weight'] / 1000 : ''),//только для квиза вес в тоннах
        'UF_CRM_1591640810'    => ($_POST['metalvid'] ? $_POST['metalvid'].' ' : '').($_POST['metaltype1'] ? $_POST['metaltype1'].' ' : '').($_POST['metaltype2'] ? $_POST['metaltype2'].' ' : ''),
        'UF_CRM_1589284613852' => ($_POST['city'] ? $_POST['city'] : ''),
        'UF_CRM_1595918738176' => ($_POST['demontazh'] ? 'Демонтаж: '.$_POST['demontazh'].'. ' : '').($_POST['delivery'] ? 'Вывоз: '.$_POST['delivery'] : ''),
    );

    if (!empty($_POST['message'])) {
        $postData['UF_CRM_1595918738176'] = $_POST['message'];
    }


    foreach ($arrNewNames as $k => $v) {
        $postData['UF_CRM_1591627302852['.$k.']'] = 'https://sagamet.ru/upload/'.$v;
    }
    $postData['UF_CRM_1591641369'] = $_subject;

    // append authorization data
    if (defined('CRM_AUTH')) {
        $postData['AUTH'] = CRM_AUTH;
    } else {
        $postData['LOGIN'] = CRM_LOGIN;
        $postData['PASSWORD'] = CRM_PASSWORD;
    }

    // open socket to CRM
    $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
    if ($fp) {
        // prepare POST data
        $strPostData = '';
        foreach ($postData as $key => $value)
            $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

        // prepare POST headers
        $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
        $str .= "Host: ".CRM_HOST."\r\n";
        $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $str .= "Content-Length: ".strlen($strPostData)."\r\n";
        $str .= "Connection: close\r\n\r\n";

        $str .= $strPostData;

        // send POST to CRM
        fwrite($fp, $str);

        // get CRM headers
        $result = '';
        while (!feof($fp)) {
            $result .= fgets($fp, 128);
        }
        fclose($fp);

        // cut response headers
        $response = explode("\r\n\r\n", $result);

        $output = '<pre>'.print_r($response[1], 1).'</pre>';
    } else {
        echo 'Connection Failed! '.$errstr.' ('.$errno.')';
    }
} else {
    $output = '';
}
