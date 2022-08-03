<?php

namespace App\Listeners;

use App\Events\CreateApartmentRoom;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Apartmentroom; 

class InsertRoomToDB implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $apartmentroom;

    public function __construct( Apartmentroom $apartmentroom)
    {
        $this->apartmentroom = $apartmentroom;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateApartmentRoom  $event
     * @return void
     */
    public function handle()
    {
        activity()->causedBy(auth()->user())->performedOn($this->apartmentroom)->log('Đã thêm 1 phòng trọ');
    }
}
