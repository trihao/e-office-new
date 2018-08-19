<?php

namespace App\Http\Controllers\Module\News;


use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\News\News;
use Illuminate\Http\Request;


class  CreateNewsController extends Controller
{
    protected $newsHelper;
    public function __construct()
    {
        $this->newsHelper = new \App\Module\News\Helper();
    }
    public function index()
    {
        $CreateUserID = session("current_user");
        return view("system/module/news/create")
            ->with("CreateUserID",$CreateUserID);
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $uploadedFile = $request->file('image');
            $fileName = "";
            if ($uploadedFile) {
                $fileName = $this->newsHelper->uploadFile($uploadedFile);
            }

            $news = new News();
            $news->setAttribute("Title",$dataPost['title']);
            $news->setAttribute("Describe",$dataPost['description']);
            $news->setAttribute("Content",$dataPost['content']);
            $news->setAttribute("Author",$dataPost['author']);
            $news->setAttribute("Keywords",$dataPost['keyword']);
            $news->setAttribute("ImageTitle",$fileName);
            $news->setAttribute("CreateUserID",session("current_user"));
            $news->setAttribute("IsHotNews",isset($dataPost['is_hotnews']) ? true : false);
            $news->setAttribute("StatusID",isset($dataPost['status_id']) ? true: false);
            $news->save();
            Helper::setSession('successMessage',"Tạo bản tin mới thành công");
            Helper::setSession('lastNewsModified',$news->NewsID);
        } catch (\Exception $exception) {
            Helper::setSession('errorMessage',$exception->getMessage());
        }
        return redirect("news/manage");
    }
}
