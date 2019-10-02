<?PHP

namespace IdentifyDigital\Auditor;

use Identify\Auditor\Contracts\AuditableInterface;

class Auditor
{
	public function audit($auditable, String $message)
	{
		if (method_exists($auditable, 'audit')) $auditable->audit($message);
		return $this;
	}
}