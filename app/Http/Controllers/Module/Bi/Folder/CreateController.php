<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  CreateController extends Controller
{

    protected $biHelper;
    public function __construct()
    {
        $this->biHelper = new \App\Module\Bi\Helper();
        Helper::setSession("dashboardMenus",\App\Http\Controllers\Module\Bi\IndexController::dashboardMenus);
    }
    public function index(Request $request)
    {
        $dataPost = $request->input();
        return view("system/module/bi/folderCreate")
            ->with("CreateUserID",Helper::getSession("current_user"))
            ->with("FolderParentID",$dataPost['FolderParentID'])
            ->with("folderTree", $this->biHelper->getFolderTree());
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $folder = new Folder();
            $folder->setAttribute('FolderName', $dataPost['FolderName']);
            $folder->setAttribute('ID', str_replace(" ","-",strtolower($dataPost['FolderName'])));
            $folder->setAttribute('FolderParentID', $dataPost['FolderParentID']);
            $folder->setAttribute('FolderDescription', $dataPost['FolderDescription']);
            $folder->setAttribute('CreateUserID', $dataPost['CreateUserID']);
            $folder->setAttribute('LastModifyUserID', $dataPost['CreateUserID']);
            $folder->save();
            Helper::setSession('successMessage',"Tạo folder mới thành công");
            return redirect('/bi');
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());die;
            return redirect('/bi');
        }
    }
}
