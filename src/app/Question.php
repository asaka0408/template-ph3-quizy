<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['prefecture_id', 'order', 'name'];
    public static $rules = array(
        'name' => 'required',
        
    );
    public function choices()
    {
        return $this->hasMany("App\Choice");
    }
}
