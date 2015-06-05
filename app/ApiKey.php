<?php namespace App;

use \Illuminate\Database\Eloquent\Model;

class ApiKey extends Model{
    public $table = 'api_keys';
    protected $fillable = ['api_key'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}