<?php

namespace IdentifyDigital\Auditor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditLog extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['message', 'icon', 'changes', 'relation', 'relation_id', 'auth', 'auth_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	protected $casts = [
	    'changes' => 'array'
    ];

    /**
     * Returns the related model owning to this Audit.
     *
     * @return BelongsTo
     */
	public function relation()
    {
        return $this->belongsTo($this->attributes['relation'], 'relation_id');
    }

    /**
     * Returns the related Authenticatable model owning this Audit.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo($this->attributes['auth'], 'auth_id');
    }
}
