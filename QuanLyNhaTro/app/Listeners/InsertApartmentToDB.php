<?php

namespace App\Listeners;

use App\Events\CreateApartment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Apartment; 

class InsertApartmentToDB implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    

    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateApartment  $event
     * @return void
     */
    public function handle(CreateApartment $event)
    {
        activity()->causedBy(auth()->user())->performedOn($this->apartment)->log('Đã thêm 1 tòa nhà');
    }
}
