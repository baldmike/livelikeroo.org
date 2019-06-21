<?php

namespace App\Observers;

use App\Models\FinReqNote;

class FinReqNoteObserver
{
    /**
     * Handle the fin req note "created" event.
     *
     * @param  \App\FinReqNote  $finReqNote
     * @return void
     */
    public function creating(FinReqNote $finReqNote)
    {
        $finReqNote->user_id = auth()->user()->id();
    }

    /**
     * Handle the fin req note "created" event.
     *
     * @param  \App\FinReqNote  $finReqNote
     * @return void
     */
    public function created(FinReqNote $finReqNote)
    {
        //
    }

    /**
     * Handle the fin req note "updated" event.
     *
     * @param  \App\FinReqNote  $finReqNote
     * @return void
     */
    public function updated(FinReqNote $finReqNote)
    {
        //
    }

    /**
     * Handle the fin req note "deleted" event.
     *
     * @param  \App\FinReqNote  $finReqNote
     * @return void
     */
    public function deleted(FinReqNote $finReqNote)
    {
        //
    }

    /**
     * Handle the fin req note "restored" event.
     *
     * @param  \App\FinReqNote  $finReqNote
     * @return void
     */
    public function restored(FinReqNote $finReqNote)
    {
        //
    }

    /**
     * Handle the fin req note "force deleted" event.
     *
     * @param  \App\FinReqNote  $finReqNote
     * @return void
     */
    public function forceDeleted(FinReqNote $finReqNote)
    {
        //
    }
}
