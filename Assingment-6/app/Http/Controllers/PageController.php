<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }

    public function work()
    {
        return view('pages.workex');
    }

    public function project()
    {
        $content = file_get_contents(storage_path('data/projects.json'));
        $json = json_decode($content);

        return view('pages.project',['json'=>$json]);
    }

}
