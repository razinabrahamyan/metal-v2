<?php


/*Forms*/

use App\Http\Controllers\FormController;

Route::post('/send-form', [FormController::class, 'sendForm'])->name('axios.sendForm');
/*Forms*/
