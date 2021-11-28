<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'date' => 'required',
        'title' => 'required',
        'body' => 'required',
        'lat' => 'required',
        'lng' => 'required',
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    ///日付をY年ｍ月ｄ日と表示する際Modelに$datesプロパティを定義して、カラムを追加する必要がある。
    protected $dates = [
        'date',
    ];

}
