<?php

namespace App\Listeners;

use App\Events\CreateApartmentRoom;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\ApartmentroomRepository;

class InsertRoomToDB implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $apartmentroomRepository;

    public function __construct(ApartmentroomRepository $apartmentroomRepository)
    {
        $this->apartmentroomRepository = $apartmentroomRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateApartmentRoom  $event
     * @return void
     */
    public function handle(CreateApartmentRoom $event)
    {
        $this->apartmentroomRepository->create($event->room);
    }
}
