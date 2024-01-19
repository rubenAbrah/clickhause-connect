<?php

namespace App\Models\Clickhouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpClickHouseLaravel\BaseModel;

class Audit extends BaseModel
{
    use HasFactory; 
    protected $table = 'audits';

}
