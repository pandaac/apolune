<?php

namespace Apolune\Core\Console\Commands;

use Illuminate\Console\Command;
use Apolune\Core\Handlers\MigrationHandler;
use Illuminate\Contracts\Foundation\Application;

class Migrate extends Command
{
    /**
     * Holds the application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:pandaac';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all the pandaac migrations';

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        parent::__construct();

        $this->app = $app;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $migrator = $this->app['migrations'];

        $migrator->locations()->each(function ($item) {
            $path = str_replace(base_path(), null, $item);

            $this->call('migrate', [
                '--path' => $path,
            ]);
        });
    }
}
