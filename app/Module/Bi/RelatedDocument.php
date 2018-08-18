<?php

namespace App\Module\Bi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelatedDocument extends Model
{
    /**
     * Table name = D76T2001
     * Table description: Entity RelatedDocument
     */
    protected $table = 'D76T2001';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }

}