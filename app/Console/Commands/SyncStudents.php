<?php

namespace App\Console\Commands;

use App\Models\customer;
use App\Models\Students;
use Illuminate\Console\Command;

class SyncStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-students';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync students from the external database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $externalStudents = Students::all();

        foreach ($externalStudents as $externalStudent) {
            $customer = customer::where('email', $externalStudent->email )->first();

            if ($customer) {

                $customer->status = 'active';
                $customer->save();
            }
        }

        $this->info('Students synchronized successfully.');
    }
}
