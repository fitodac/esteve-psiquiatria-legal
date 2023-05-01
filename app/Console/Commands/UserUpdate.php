<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UserUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users name';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = storage_path('seeders/users_update.csv');

        if (($handle = fopen($path, 'r')) !== FALSE)
        {
            $first = true;
            while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
            {
                if($first) {
                    $first = false;
                    continue;
                }

                try {
                    $user = User::where('email', $row[0])->update(['name' => $row[1]]);

                    if(!$user) {
                        Log::info(['no encontrados' => $row]);
                    }

                } catch (\Exception $e) {
                    Log::info($row);
                }
            }
        }
        $this->info('Finalizado');
        return Command::SUCCESS;
    }
}
