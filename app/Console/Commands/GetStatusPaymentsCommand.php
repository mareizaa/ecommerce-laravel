<?php

namespace App\Console\Commands;

use App\Jobs\GetStatusPaymentsJob;
use Illuminate\Console\Command;

class GetStatusPaymentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check payment status';

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
        GetStatusPaymentsJob::dispatchSync();
    }
}
