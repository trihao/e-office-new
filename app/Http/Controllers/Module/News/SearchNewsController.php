<?php

namespace App\Http\Controllers\Module\News;


use App\Http\Controllers\Controller;
use App\Module\News\News;
use Illuminate\Http\Request;


class  SearchNewsController extends Controller
{
    public function searchTitle(Request $request)
    {
        $dataPost = $request->input();
        $title = $dataPost["searchTitle"];
        $newsCollection = $this->getNewsByRelativeTitle($title);
        return json_encode($newsCollection);
    }

    public function getNewsByRelativeTitle($title)
    {
        $newsFactory = new News();
        $collection = $newsFactory->getNewsByRelativeTitle($title);
        return $collection;
    }
}
