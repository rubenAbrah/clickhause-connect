<?php

namespace App\Observers;

use App\Models\AuditTest;


class FirstObserver
{
    public $afterCommit = true;
    /**
     * Handle the AuditTest "created" event.
     */
    public function created(AuditTest $user): void
    {
        dump(["created", $user->getChanges(),$user->getOriginal()]);
    }

    /**
     * Handle the AuditTest "updated" event.
     */
    public function updated(AuditTest $user): void
    {
        dump([
            "updated", $user->getChanges(),$user->getOriginal()
        ]);
    }

    /**
     * Handle the AuditTest "deleted" event.
     */
    public function deleted(AuditTest $user): void
    {
        dump(["deleted", $user->getChanges(),$user->getOriginal()]);
    }

    /**
     * Handle the AuditTest "restored" event.
     */
    public function restored(AuditTest $user): void
    {
        dump(["restored", $user->getChanges(),$user->getOriginal()]);
    }

    /**
     * Handle the AuditTest "force deleted" event.
     */
    public function forceDeleted(AuditTest $user): void
    {
        dump(["forceDeleted", $user->getChanges(),$user->getOriginal()]);
    }
}
