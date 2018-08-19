<?php

namespace App\Http\Controllers\Module\News;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use App\Module\News\News;
use Illuminate\Http\Request;

class  ManageNewsController extends Controller
{

    public function index()
    {
        $newsCollection = $this->getNewsCollection();
        return view("system/module/news/manage")->with("newsCollection",$newsCollection);
    }

    public function filter(Request $request)
    {
        $dataPost = $request->input();
        $title = $dataPost["searchTitle"];
        $newsCollection = $this->getNewsByRelativeTitle($title);
        return view("system/module/news/manage")->with("newsCollection",$newsCollection);
    }

    public function getNewsCollection()
    {
        $newsFactory = new News();
        $collection = $newsFactory->getCollection();
        return $collection;
    }

    public function getNewsByRelativeTitle($title)
    {
        $newsFactory = new News();
        $collection = $newsFactory->getNewsByRelativeTitle($title);
        return $collection;
    }
}
