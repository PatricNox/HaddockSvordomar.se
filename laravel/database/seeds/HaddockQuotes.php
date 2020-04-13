<?php

use Illuminate\Database\Seeder;
use App\Haddock;

class HaddockQuotes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotes = require_once(__DIR__ . '/content/haddock.php');
        foreach ($quotes as $quote) {
            // Only populate new data, don't overwrite existing.
            Haddock::firstOrCreate(['quote' => $quote]);
        }
    }
}
