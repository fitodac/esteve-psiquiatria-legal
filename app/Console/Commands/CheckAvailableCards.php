<?php

namespace App\Console\Commands;

use App\Models\GiftCard;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckAvailableCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'giftcard:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to admin when low giftcard stock';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $giftcard = GiftCard::whereNull('user_id')->count();
        $from = config('mail.from.address');
        $to = env('MAIL_TO_ADDRESS');

        if($giftcard <= 50) {
            try {
                var_dump($giftcard);
                Mail::send('low_giftccard_mail', array(
                    'total' => $giftcard,
                ), function($message) use ($from, $to){
                    $message->from($from);
                    $message->to($to);
                    $message->subject('Sistema automático de verificación de tarjetas de regalo');
                });
            } catch (\Throwable $th) {
                Log::info($th);
                return Command::FAILURE;
            }
        }

        return Command::SUCCESS;
    }
}
