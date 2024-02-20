<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;

class GetColor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-color';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the currently set color';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $suburb = Config::get('app.suburb');
        $color = Redis::get('color:suburb:' . $suburb);

        if (!$color) {
            $this->error('No color set');
        } else {
            $this->line("Current color is: <fg=$color>$color</>");
        }

    }
}
