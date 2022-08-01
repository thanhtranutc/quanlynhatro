<?php

namespace App\Console\Commands;

use App\Events\SendMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

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

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Event::dispatch(new SendMail());
        

        return 0;
    }
}
