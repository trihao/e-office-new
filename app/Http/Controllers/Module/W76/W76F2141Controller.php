<?php

namespace App\Http\Controllers\Module\W76;

use App\Http\Controllers\Controller;
use App\Module\News\D76T1556;
use App\Module\News\D76T2140;
use App\Module\News\D76T2141;
use App\Module\News\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2141Controller extends Controller
{
    protected $newsHelper;


    public function __construct(D76T2140 $d76T2140, D76T2141 $d76T2141, D76T1556 $d76T5556)
    {
        $this->d76T2140 = $d76T2140;
        $this->d76T2141 = $d76T2141;
        $this->d76T5556 = $d76T5556;
        $this->newsHelper = new \App\Module\News\Helper();
    }


    public function index(Request $request, $task = "")
    {

        switch ($task) {
            case 'add':
                $d76T1556 = new D76T1556();
                $channelIDList = $this->d76T5556->where('ListTypeID', '=', 'NEW_CATEGORIES')->get();
                $CreateUserID = session("current_user");

                $rowData = json_encode(array());
                $rowDataDetail = json_encode(array());

                return view("system/module/W76/W76F2141", compact('rowData','rowDataDetail', 'channelIDList', 'CreateUserID', 'task'));
                break;
            case 'edit':
                $newsID = $request->input('newsID', '');
                $channelIDList = $this->d76T5556->where('ListTypeID', '=', 'NEW_CATEGORIES')->get();
                $rowData = $this->getMasterData($newsID);
                $rowDataDetail = $this->getDetailData($newsID);

                $rowData = json_encode($rowData);
                $rowDataDetail = json_encode($rowDataDetail);

                return view("system/module/W76/W76F2141", compact('rowData', 'rowDataDetail', 'task', 'channelIDList'));
                break;
            case 'abc':
                $channelIDList = $this->d76T5556->where('ListTypeID', '=', 'NEW_CATEGORIES')->get();
                $newsCollection = json_encode([]);
                return view("system/module/W76/W76F2141_SelectNews", compact('task', 'newsCollection', 'channelIDList'));
                break;
            case 'xy':
                $cboChannelIDSelectNews = $request->input('cboChannelIDSelectNews', '');
                $cboChannelIDSelectNews = ($cboChannelIDSelectNews == null ? '' : $cboChannelIDSelectNews);
                $channelIDList = $this->getNewsFilter($cboChannelIDSelectNews);
                return json_encode($channelIDList);
                break;
            case 'save':
                try {

                    $fileName = "";
                    /*if ($uploadedFile) {
                        $fileName = $this->newsHelper->uploadFile($uploadedFile);
                    }*/
                    //get input
                    $newsID = DB::selectOne('select NEWID() as NewsID')->NewsID;

                    $channelIDW76F2141 = \Helpers::sqlstring($request->input('channelIDW76F2141', ''));
                    $titleW76F2141 = \Helpers::sqlstring($request->input('titleW76F2141', ''));
                    $contentW76F2141 = \Helpers::sqlstring($request->input('contentW76F2141', ''));
                    $remarkW76F2141 = \Helpers::sqlstring($request->input('remarkW76F2141', ''));
                    $keywordW76F2141 = \Helpers::sqlstring($request->input('keywordW76F2141', ''));
                    $orderNoW76F2141 = \Helpers::sqlNumber($request->input('orderNoW76F2141', 1));
                    $is_hotnewsW76F2141 = \Helpers::sqlNumber($request->input('is_hotnewsW76F2141', 0));
                    $is_ShowBestNewsW76F2141 = \Helpers::sqlNumber($request->input('is_ShowBestNewsW76F2141', 0));
                    $releaseDateW76F2141 = \Helpers::createDateTime($request->input('releaseDateW76F2141', ''));
                    $status_idW76F2141 = \Helpers::sqlNumber($request->input('status_idW76F2141', 0));
                    $relativeNews = ($request->input('relativeNews', "[]"));
                    $userID = Auth::user()->UserID;
                    $dateNow = Carbon::now();

                    $image = DB::raw('null');
                    ///Receive file
                    if ($request->hasFile('image')) {
                        $file = $request->file('image');
                        $fileName = \Helpers::sqlstring($file->getClientOriginalName());
                        $fileSize = $file->getSize();
                        $fileExtension =$file->getClientOriginalExtension();
                        $byteArray = ("0x" . bin2hex(file_get_contents($file->getRealPath())));
                        $image = DB::raw("CONVERT(varbinary(MAX), " . $byteArray . ")");
                    }


                    //save master
                    $data = [
                        "NewsID" => $newsID,
                        "ChannelID" => $channelIDW76F2141,
                        "Title" => $titleW76F2141,
                        "Content" => $contentW76F2141,
                        "Remark" => $remarkW76F2141,
                        "Keywords" => $keywordW76F2141,
                        "OrderNo" => $orderNoW76F2141,
                        "IsHotNews" => $is_hotnewsW76F2141,
                        "IsShowBestNews" => $is_ShowBestNewsW76F2141,
                        "ReleaseDate" => $releaseDateW76F2141,
                        "StatusID" => $status_idW76F2141,
                        "Author" => $userID,
                        "CreateUserID" => $userID,
                        "CreateDate" => $dateNow,
                        "LastModifyUserID" => $userID,
                        "LastModifyDate" => $dateNow,
                        "Image"=> $image,
                    ];
                    $this->d76T2140->insert($data);

                    //save detail
                    if (count(json_decode($relativeNews)) > 0) {
                        foreach (json_decode($relativeNews) as $row) {
                            $ID = DB::selectOne('select NEWID() as NewsID')->NewsID;
                            $newsIDMaster = $newsID;
                            $newsIDRelative = $row->NewsID;
                            $detail = [
                                "ID" => $ID,
                                "NewsID" => $newsIDMaster,
                                "RelatedNewsID" => $newsIDRelative
                            ];
                            $this->d76T2141->insert($detail);
                        }
                    }


                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    \Helpers::setSession('lastNewsModified', $newsID);
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong')]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'update':
                try {

                    $newsID = $request->input('newsID', '');
                    $channelIDW76F2141 = \Helpers::sqlstring($request->input('channelIDW76F2141', ''));
                    $titleW76F2141 = \Helpers::sqlstring($request->input('titleW76F2141', ''));
                    $contentW76F2141 = \Helpers::sqlstring($request->input('contentW76F2141', ''));
                    $remarkW76F2141 = \Helpers::sqlstring($request->input('remarkW76F2141', ''));
                    $keywordW76F2141 = \Helpers::sqlstring($request->input('keywordW76F2141', ''));
                    $orderNoW76F2141 = \Helpers::sqlNumber($request->input('orderNoW76F2141', 1));
                    $is_hotnewsW76F2141 = \Helpers::sqlNumber($request->input('is_hotnewsW76F2141', 0));
                    $is_ShowBestNewsW76F2141 = \Helpers::sqlNumber($request->input('is_ShowBestNewsW76F2141', 0));
                    $releaseDateW76F2141 = \Helpers::createDateTime($request->input('releaseDateW76F2141', ''));
                    $status_idW76F2141 = \Helpers::sqlNumber($request->input('status_idW76F2141', 0));
                    $relativeNews = ($request->input('relativeNews', "[]"));
                    $userID = Auth::user()->UserID;
                    $dateNow = Carbon::now();

                    $image = DB::raw('null');
                    ///Receive file

                    if ($request->hasFile('image')) {
                        $file = $request->file('image');
                        $fileName = \Helpers::sqlstring($file->getClientOriginalName());
                        $fileSize = $file->getSize();
                        $fileExtension =$file->getClientOriginalExtension();
                        $byteArray = ("0x" . bin2hex(file_get_contents($file->getRealPath())));
                        $image = DB::raw("CONVERT(varbinary(MAX), " . $byteArray . ")");
                        $data = [
                            "Image"=> $image,
                        ];
                        $this->d76T2140->where('NewsID','=',$newsID)->update($data);
                    }


                    //save master
                    $data = [
                        "ChannelID" => $channelIDW76F2141,
                        "Title" => $titleW76F2141,
                        "Content" => $contentW76F2141,
                        "Remark" => $remarkW76F2141,
                        "Keywords" => $keywordW76F2141,
                        "OrderNo" => $orderNoW76F2141,
                        "IsHotNews" => $is_hotnewsW76F2141,
                        "IsShowBestNews" => $is_ShowBestNewsW76F2141,
                        "ReleaseDate" => $releaseDateW76F2141,
                        "StatusID" => $status_idW76F2141,
                        "Author" => $userID,
                        //"CreateUserID" => $userID,
                        //"CreateDate" => $dateNow,
                        "LastModifyUserID" => $userID,
                        "LastModifyDate" => $dateNow,
                        //"Image"=> $image,
                    ];
                    $this->d76T2140->where('NewsID','=',$newsID)->update($data);

                    //save detail
                    if (count(json_decode($relativeNews)) > 0) {
                        $this->d76T2141->where("NewsID", "=", $newsID)->delete();
                        foreach (json_decode($relativeNews) as $row) {
                            $ID = DB::selectOne('select NEWID() as NewsID')->NewsID;
                            $newsIDMaster = $newsID;
                            $newsIDRelative = $row->NewsID;
                            $detail = [
                                "ID" => $ID,
                                "NewsID" => $newsIDMaster,
                                "RelatedNewsID" => $newsIDRelative
                            ];
                            $this->d76T2141->insert($detail);
                        }
                    }


                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    \Helpers::setSession('lastNewsModified', $newsID);
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong')]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
        }

    }

    private function getMasterData($newsID){
       $result = $this->d76T2140->where("NewsID", "=", $newsID)->first();
       $image = "data:image/jpeg;base64,". base64_encode($result->Image) ;
       $result->Image = $image;
        return $result;
    }

    private function getDetailData($newsID){
        return  $this->d76T2141
            ->leftJoin("D76T2140",'D76T2140.NewsID', '=', 'D76T2141.RelatedNewsID')
            ->select("D76T2140.Title", "D76T2141.NewsID", "D76T2141.RelatedNewsID")
            ->where("D76T2141.NewsID", "=", $newsID)->get();
    }

    private function getNewsFilter($cboChannelIDSelectNews){
        $result = $this->d76T2140->where('ChannelID', '=', $cboChannelIDSelectNews)->get();
        foreach ($result as &$item) {
            //unset($item->Image);
            $item->Image = htmlentities($item->Image);
        }
        return $result;
    }
}
