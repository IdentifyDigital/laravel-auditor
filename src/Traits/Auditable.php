<?php

namespace IdentifyDigital\Auditor\Traits;

use IdentifyDigital\Auditor\Models\AuditLog;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

trait Auditable
{
    /**
     * Attaches a new audit to the current Model.
     *
     * @param $message
     * @param array|null $changes
     * @param Authenticatable $user
     * @return Model|AuditLog
     */
	public function audit($message, array $changes = null, Authenticatable $user = null)
	{
	    return $this->audits()->create([
	        'message' => $message,
            'changes' => $changes,
            'relation' => self::class,
            'auth' => $user instanceof Authenticatable ? get_class($user) : null,
            'auth_id' => $user instanceof Authenticatable ? $user->getKey() : null
        ]);
	}

	/**
	 * Returns a collection of audit logs belonging to this model.
	 *
	 * @return BelongsToMany
	 */
	public function audits()
	{
		return $this->hasMany(AuditLog::class, 'relation_id')
            ->where('relation', self::class);
	}
}
