<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  RenameController extends Controller
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
        $oldFolder = Folder::find($dataPost['SelectedFolderId']);
        return view("system/module/bi/folderRename")
            ->with("oldFolderName",$oldFolder->FolderName)
            ->with("currentFolderId",$dataPost['SelectedFolderId'])
            ->with("folderTree", $this->biHelper->getFolderTree());
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $folderId = $dataPost['FolderID'];
            $newFolderName = $dataPost['NewFolderName'];
            $folderFactory = Folder::find($folderId);
            $folderFactory->FolderName = $newFolderName;
            $folderFactory->save();
            Helper::setSession('successMessage',"Đổi tên thư mục thành công");
            return redirect('/bi');
        } catch (\Exception $exception) {
            return redirect('/bi');
        }
    }
}
