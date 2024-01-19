<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class MyTable extends Model
// {
//     use HasFactory;
// } 


namespace App\Models\Clickhouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpClickHouseLaravel\BaseModel;

class MyTable extends BaseModel
{
    use HasFactory;
    // Not necessary. Can be obtained from class name MyTable => my_table
    protected $table = 'events';
}
