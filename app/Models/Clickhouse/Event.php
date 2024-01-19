<?

namespace App\Models\Clickhouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpClickHouseLaravel\BaseModel;

class Event extends BaseModel
{
    use HasFactory;
    protected $table = 'events';
}
