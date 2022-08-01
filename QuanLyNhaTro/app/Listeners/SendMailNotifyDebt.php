<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Repositories\RoomfeeRepository;
use App\Repositories\TenantRepository;
use App\Mail\NotificationDebt;

class SendMailNotifyDebt implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $roomfeeRepository;

    protected $tenantRepository;

    public function __construct(
        RoomfeeRepository $roomfeeRepository,
        TenantRepository $tenantRepository
    )
    {
        $this->roomfeeRepository =$roomfeeRepository;
        $this->tenantRepository =$tenantRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle()
    {
        $listRoom = $this->roomfeeRepository->getRoomDebtLastMonth();
         if($listRoom){
            foreach($listRoom as $value){
                $tenant = $this->tenantRepository->findById($value->tenant_id);
                Mail::to($tenant->email)->send(new NotificationDebt($tenant));
            }
         }
         activity()->causedBy(auth()->user())->log('Đã gửi mail thông báo nợ tiền trọ tới '.$tenant->email);
    }
}
