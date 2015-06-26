<?php namespace App\Http\Controllers;

class DocumentationController extends Controller {

    public function gettingStarted()
    {
        return view('docs.getting_started');
    }

    public function howToUse()
    {
        return view('docs.how_to_use');
    }

    public function endpoints()
    {
        return view('docs.endpoints');
    }

    public function libraries()
    {
        return view('docs.libraries');
    }
}
