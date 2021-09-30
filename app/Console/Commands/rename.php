<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class rename extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advancelara:rename {from : Name of table you want to rename} {to : Name you want to give now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rename table';

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
        $from = $this->argument('from');
        $to = $this->argument('to');

        DB::statement("ALTER TABLE $from RENAME TO $to");
        $this->info("Table $from is now rename to $to");      
        return 0;
    }
}
