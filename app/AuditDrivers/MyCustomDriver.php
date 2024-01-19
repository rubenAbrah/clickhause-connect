<?php

namespace App\AuditDrivers;

use App\Models\Clickhouse\Audit as AuditModel;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\AuditDriver;
use Illuminate\Support\Facades\Config;

class MyCustomDriver implements AuditDriver
{
    /**
     * Perform an audit.
     *
     * @param \OwenIt\Auditing\Contracts\Auditable $model
     *
     * @return \OwenIt\Auditing\Contracts\Audit
     */
    public function audit(Auditable $model): Audit
    {

        $data =   $model->toAudit();
        $data['id'] =  \Illuminate\Support\Str::uuid();
        $data['new_values'] = json_encode($data['new_values']); //, JSON_FORCE_OBJECT
        $data['old_values'] = json_encode($data['old_values']); //JSON_FORCE_OBJECT 
        $data['user_type'] = \Illuminate\Support\Facades\Auth::user()->user_type;
        $data['created_at'] = now();

        // dump($data);
        AuditModel::make($data)->save();

        $implementation = Config::get('audit.implementation', \OwenIt\Auditing\Models\Audit::class);
        return new $implementation;
    }

    /**
     * Remove older audits that go over the threshold.
     *
     * @param \OwenIt\Auditing\Contracts\Auditable $model
     *
     * @return bool
     */
    public function prune(Auditable $model): bool
    {
        return false;
    }
}
