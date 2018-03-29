<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $table = 'measurements';

    // One measurement only belongs to a single bucket
    public function bucket()
    {
      return $this->belongsTo('App\Bucket', 'bucket_id', 'id');
    }
}
