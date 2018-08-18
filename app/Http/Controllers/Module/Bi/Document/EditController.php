<?php

namespace App\Http\Controllers\Module\Bi\Document;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  EditController extends Controller
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
        $documentID = $dataPost['documentID'];
        $document = Document::find($documentID);
        return view("system/module/bi/documentEdit")
            ->with("currentDocument", $document)
            ->with("folderTree", $this->biHelper->getFolderTree());

    }

    public function execute(Request $request)
    {
        die('Write handles to save the document');
    }


}