<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  ViewController extends Controller
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
        $requestFolderId = $dataPost['FolderId'];
        $childFolders = $this->getChildFolders($requestFolderId);
        $childDocuments = $this->getChildDocuments($requestFolderId);
        return view("system/module/bi/folderView")
            ->with("folderTree", $this->biHelper->getFolderTree())
            ->with("childDocuments",$childDocuments)
            ->with("childFolders",$childFolders);

    }

    public function getChildFolders($folderId)
    {
        $folderFactory = new Folder();
        $childFolders = $folderFactory->getAllChildFolder($folderId);
        return $childFolders;
    }

    public function getChildDocuments($folderId)
    {
        $documentFactory = new Document();
        $childDocuments = $documentFactory->getDocumentsWithFolderId($folderId);
        return $childDocuments;

    }

}