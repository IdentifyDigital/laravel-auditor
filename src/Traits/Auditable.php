<?PHP

namespace IdentifyDigital\Auditor\Traits;

use IdentifyDigital\Auditor\Models\AuditLog;

trait Auditable
{
	/**
	 * Add an audit log to the current model /
	 *
	 * @param String $message 	[ The message associated with this audit log ]
	 * @return Auditable		[ The object being audited ]
	 */
	public function audit(String $message)
	{
		AuditLog::create([
			'message' 		=> $message,
			'relation' 		=> self::class,
			'relation_id' 	=> $this->id
		]);
		return $this; 
	}
	
	/**
	 * Returns a collection of audit logs associated with the current model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function audits()
	{
		return $this->belongsToMany(AuditLog::class, 'audit_logs', 'relation_id')
						->where('relation', self::class);
	}
}