<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeCustomLivewire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clivewire {name} {--admin} {--customer}';
    // 'livewire:make {name} {--force} {--inline} {--test} {--pest} {--stub= : If you have several stubs, stored in subfolders }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Livewire component with custom stubs for different layers which can be: admin, customer';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $layer = null;

        if ($this->option('admin')) {
            $layer = 'admin';
        }

        if ($this->option('customer')) {
            $layer = 'customer';
        }

        $this->call('make:livewire', [
            'name' => $name,
            ...($layer ? ['--stub' => $layer] : [])
        ]);
    }
}
