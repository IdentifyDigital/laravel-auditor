<?php

namespace IdentifyDigital\Auditor\Observers;

use IdentifyDigital\Auditor\Facades\Auditor;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuditObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  Model $model
     * @return void
     */
    public function created(Model $model)
    {
        Auditor::audit($model, "Object Created", $model->getDirty(), $this->getAuthenticatedUser());
    }

    /**
     * Handle the user "updating" event.
     *
     * @param  Model $model
     * @return void
     */
    public function updating(Model $model)
    {
        Auditor::audit($model, "Object Updated", $model->getDirty(), $this->getAuthenticatedUser());
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  Model $model
     * @return void
     */
    public function deleting(Model $model)
    {
        Auditor::audit($model, "Object Deleted", $model->getDirty(), $this->getAuthenticatedUser());
    }

    /**
     * Returns the currently authenticated model.
     *
     * @return Authenticatable|null
     */
    private function getAuthenticatedUser()
    {
        $guards = array_keys(config('auth.guards'));
        foreach ($guards as $guard) {
            if(Auth::guard($guard)->check()) return Auth::guard($guard)->user();
        }

        return null;
    }
}
