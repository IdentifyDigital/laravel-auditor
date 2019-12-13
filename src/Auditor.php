<?php

namespace IdentifyDigital\Auditor;

use IdentifyDigital\Auditor\Exceptions\ModelNotAuditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auditor
{

    /**
     * Attaches a new Audit to the specified $model.
     *
     * @param Model $model
     * @param $message
     * @param array $changes
     * @param Authenticatable|null $user
     * @throws ModelNotAuditable
     */
    public function audit(Model $model, $message, array $changes = [], Authenticatable $user = null)
    {
        if(!method_exists($model, 'audit'))
            throw new ModelNotAuditable("Model does not use Auditable Trait");

        //Attach the audit to the $model here
        $model->audit($message, $changes, $user);
    }
}
