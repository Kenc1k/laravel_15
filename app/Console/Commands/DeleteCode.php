<?php

namespace App\Console\Commands;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteCode extends Command
{
    /**
     * Command configuration.
     */
    protected function configure(): void
    {
        $this->setName('delete:code')
             ->setDescription('Delete records older than 1 minute');
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $deleted = Store::query()
                ->where('created_at', '<', now()->subMinute())
                ->delete();
            
            // Log deletion
            Log::info("Deleted {$deleted} records older than 1 minute");
            
            // Using new Laravel 11 output styling
            $this->components->info("Successfully deleted {$deleted} records");

            return Command::SUCCESS;
        } catch (\Exception $e) {
            Log::error("Error deleting records: " . $e->getMessage());
            $this->components->error("Error deleting records: " . $e->getMessage());

            return Command::FAILURE;
        }
    }
}