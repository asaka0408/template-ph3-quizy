<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static $rules = array(
        'name' => 'required',
        
    );
    public function choices()
    {
        return $this->hasMany("App\Choice");
    }
}
