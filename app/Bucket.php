<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    protected $table = 'buckets';

    public function measurements()
    {
      return $this->hasMany('App\Measurement', 'bucket_id', 'id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'emptied_by_user_id', 'id');
    }


}
