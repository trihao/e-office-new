<?php

namespace App\Http\Controllers\Module\Bi;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;


class  IndexController extends Controller
{
    const dashboardMenus = [
//        [
//            "title" => "Quản lý chuyên mục",
//            "url"   => "#",
//        ],
//        [
//            "title" => "Quản lý quyền truy cập",
//            "url"   => "#",
//        ],
//        [
//            "title" => "Quản lý tài liệu",
//            "url"   => "#",
//        ]
    ];
    public function __construct()
    {
        Helper::setSession("dashboardMenus",self::dashboardMenus);
    }

    public function index()
    {
        if (Helper::getSession("previousRequest")) {
            return view('system/module/bi')
                ->with("previousUrl",Helper::getSession("previousUrl"))
                ->with("folderTree", $this->getFolderTree());
        }
        if (Helper::isAUserInSession()) {
            return view('system/module/bi')->with("folderTree", $this->getFolderTree());
        } else {
            return view('user/login');
        }
    }

    public function getFolderTree()
    {
        $helper = new \App\Module\Bi\Helper();
        $tree = $helper->viewTree();
        return $tree;
    }
}
