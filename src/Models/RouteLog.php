<?php

namespace MohammadMghi\RouteTracker\Models;

use Illuminate\Database\Eloquent\Model;

class RouteLog extends Model
{
    protected $table = 'route_logs';

    protected $fillable = [
        'user_id',
        'route',
        'method',
        'ip',
        'user_agent',
        'duration',
        'created_at'
    ];
}
