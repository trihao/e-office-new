<?php

namespace App\Http\Controllers\Module\Bi\Document;

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
        $requestDocumentId = $dataPost['DocumentId'];

        $requestDocument = Document::find($requestDocumentId);
        return view("system/module/bi/documentView")
            ->with("folderTree", $this->biHelper->getFolderTree())
            ->with("document",$requestDocument)
            ->with("documentID",$requestDocumentId);

    }


}