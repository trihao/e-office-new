<?php

namespace App\Module\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    /**
     * Table name = D76T2140
     * Table description: Module News: Entity News
     */
    protected $table = 'D76T2140';
    protected $primaryKey = 'NewsID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }

    public function getNewsByRelativeTitle($title)
    {
        $collection = DB::table($this->table)
            ->where("Title","LIKE","%$title%")
            ->get();
        return $collection;
    }

}