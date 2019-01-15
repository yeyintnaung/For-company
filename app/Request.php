<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'request';

    protected $primaryKey = 'id';

    protected $fillable=['post_id', 'post_uploader_id', 'requester_id', 'status', 'created_at', 'updated_at'];
}
