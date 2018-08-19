<?php

namespace App\Http\Controllers\Module\News;


use App\Http\Controllers\Controller;


class  NewsController extends Controller
{
    public function index()
    {
        return view("system/module/news");
    }
}
