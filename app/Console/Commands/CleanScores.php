<?php

namespace App\Console\Commands;

use App\Models\Score;
use Illuminate\Console\Command;

class CleanScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:scores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Score::truncate();
        return Command::SUCCESS;
    }
}
