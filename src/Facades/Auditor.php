<?php

namespace IdentifyDigital\Auditor\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void audit(Model $model, string $message, array $changes = [], Authenticatable $user = null)
 *
 * @see \IdentifyDigital\Auditor\Auditor
 */
class Auditor extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
	protected static function getFacadeAccessor()
	{
		return 'auditor';
	}
}
