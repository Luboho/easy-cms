<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class EasyCms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'easyCms:install {--force : Do not ask for user confirmation.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install neccessary data for application start.';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('force')) {
            $this->proceed();
        } else {
            if ($this->confirm('This will delete ALL your current data and install the default data. Are you sure?')) {
                $this->proceed();
            }
        }
    }

    protected function proceed()
    {
        File::deleteDirectory(public_path('storage/uploads'));

        $this->callSilent('storage:link');

        $this->call('migrate:fresh', [
            '--seed' => true,
            '--force' => true,
        ]);

        $this->info('Default data Installed. Lets begin.');
    }
}
