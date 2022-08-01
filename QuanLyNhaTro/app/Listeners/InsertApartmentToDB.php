<?php

namespace App\Listeners;

use App\Events\CreateApartment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\ApartmentRepository;

class InsertApartmentToDB implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $apartmentRepository;

    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateApartment  $event
     * @return void
     */
    public function handle(CreateApartment $event)
    {
        $this->apartmentRepository->create($event->apartment);
    }
}
