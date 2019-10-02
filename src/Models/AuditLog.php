<?PHP

namespace IdentifyDigital\Auditor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditLog extends Model
{
	use SoftDeletes;
	
	/**
	 * Attributes that can be assigned
	 *
	 * @var Array
	 */
	protected $fillable = ['message', 'relation', 'relation_id'];
}