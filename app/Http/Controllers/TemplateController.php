<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{


     public function index(){
        $todos = [
            [
                "title" => 'Learn Laravel',
                "body" => 'Laravel is a web app.'
            ],
            [
                "title" => 'Learn Vue',
                "body" => 'Vue is a progressive.'
            ],
             [
                "title" => 'Learn React',
                "body" => 'React makes it.'
            ]
        ];
         return view('mytemplate.index', compact('todos'));
    }
    
    public function about()
    {
        return view('mytemplate.about');

    }
    public function post()
    {
        return view('mytemplate.post');

    }
    public function contact()
    {
        return view('mytemplate.contact');

    }

}
