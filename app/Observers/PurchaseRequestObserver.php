<?php

namespace App\Observers;

use App\Models\PurchaseRequest;

class PurchaseRequestObserver
{
    /**
     * Handle the PurchaseRequest "created" event.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return void
     */
    public function created(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Handle the PurchaseRequest "updated" event.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return void
     */
    public function updating(PurchaseRequest $purchaseRequest)
    {
        if($purchaseRequest->status === true){
            $purchaseRequest->publication_date = 'now()';
        }
    }

    /**
     * Handle the PurchaseRequest "deleted" event.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return void
     */
    public function deleted(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Handle the PurchaseRequest "restored" event.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return void
     */
    public function restored(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Handle the PurchaseRequest "force deleted" event.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return void
     */
    public function forceDeleted(PurchaseRequest $purchaseRequest)
    {
        //
    }
}
