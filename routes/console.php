<?php

use App\Classes\YandexTurbo\TurboGenerator;
use App\Http\Controllers\SiteMapXMLGenerator;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('generate:sitemap', function () {
    try {
        (new SiteMapXMLGenerator())->generateXML();
        $this->comment('sitemap.xml was generated/updated');
    } catch (Exception $exception) {
        $this->comment($exception->getMessage());
    }
})->purpose('Generate sitemap.xml');

Artisan::command('generate:yandexturbo', function () {
    try {
        TurboGenerator::generate(); //Только продукты
        $this->comment('RSS сгенерирован!');
    } catch (Exception $exception) {
        $this->comment($exception->getMessage());
    }
})->purpose('Generate Yandex Turbo Page For Products');
