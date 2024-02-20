<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;

class ChangeColor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-color';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually update the current color for today';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $colors = Config::get('app.colors');
        $color = array_rand($colors);
        $suburb = Config::get('app.suburb');

        Redis::set('color:suburb:' . $suburb, $color);
        $this->line("New color set as: <fg=$color>$color</>");
    }
}