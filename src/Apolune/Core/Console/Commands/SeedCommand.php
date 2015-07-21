<?php

namespace Apolune\Core\Console\Commands;

use Illuminate\Database\Console\Seeds\SeedCommand as Command;

class SeedCommand extends Command
{
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        if (!$this->confirmToProceed()) {
            return;
        }

        $this->resolver->setDefaultConnection($this->getDatabase());

        list($command, $seeders) = [$this, $this->seeders()];

        $seeders->push($this->input->getOption('class'));

        $seeders->each(function ($seeder) use ($command) {
            $class = $command->laravel->make($seeder);

            $class->setContainer($command->laravel)->setCommand($command)->run();
        });
    }

    /**
     * Retrieve all the registered seeders.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function seeders()
    {
        return app('seed.handler')->seeders();
    }
}
