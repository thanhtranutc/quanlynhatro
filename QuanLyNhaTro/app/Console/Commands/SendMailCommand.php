<?php

namespace App\Console\Commands;

use App\Mail\NotificationDebt;
use Illuminate\Console\Command;
use App\Repositories\RoomfeeRepository;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Mail;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roomdebt:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
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
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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

        return 0;
    }
}
