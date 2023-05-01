<?php

namespace App\Jobs;

use App\Models\GiftCard;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportGiftCard implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * The file path.
     *
     * @var String
     */
    public $filename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = $this->filename;

        if (($handle = fopen($path, 'r')) !== FALSE)
        {
            $first = true;
            while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
            {
                if($first) {
                    $first = false;
                    continue;
                }

                GiftCard::firstOrCreate([
                    'username'      => $row[0],
                    'password'      => $row[1],
                    'user_id'       => null,
                    'amount'        => intval($row[2]),
                    'delivery_date' => null,
                    'expiration'    => $row[3],
                ]);
            }

            fclose($handle);
        }
    }
}
