<?php

namespace App\Module\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    /**
     * Table name = D76T2141
     * Table description: Module News: Entity Related News
     */
    protected $table = 'D76T2141';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }

}