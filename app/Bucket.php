<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    protected $table = 'buckets';

    // A bucket can have many measurements
    public function measurements()
    {
      return $this->hasMany('App\Measurement', 'bucket_id', 'id');
    }

    // A bucket only is last handled by one user
    public function user()
    {
      return $this->belongsTo('App\User', 'emptied_by_user_id', 'id');
    }


}
