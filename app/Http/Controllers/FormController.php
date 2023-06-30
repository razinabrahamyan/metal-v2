<?php

namespace App\Http\Controllers;

use App\Library\Services\Contracts\FormContract;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private $formService;

    /**
     * FormController constructor.
     * @param \App\Library\Services\Contracts\FormContract $formService
     */
    public function __construct(FormContract $formService)
    {
        $this->formService = $formService;
    }

    public function sendForm(Request $request)
    {
        return $this->formService->sendForm($request);
    }
}
