<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TaxPreparerController extends Controller
{
    /**
     * Display the Tax Preparer landing page.
     */
    public function index(): View
    {
        return view('pages.taxpreparer.index');
    }
}
