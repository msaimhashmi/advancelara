<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class testCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-command {name=saim} {--l|lastname=hashmi}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command description';

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
        // 1 FIRST
        // $name = $this->argument('name');
        // $lname = $this->option('lastname');
        // $this->info($name .' '. $lname);



        // 2 SECOND
        // $name = $this->ask('What is your name?');
        // $name = $this->secret('What is your name?');
        // $confirm = $this->confirm('Do you want to print your secret name?');
        // if($confirm)
        // {
        //     $this->info($name);
        // }
        


        // 3 THIRD
        $header = ['Name', 'Email'];
        $user = User::select('name', 'email')->get();

        $this->table($header, $user);

        // return 0;
    }
}
