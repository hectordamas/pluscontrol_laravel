<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Esp;
use App\Models\EspLog;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // Lógica para cambiar el estado de los usuarios a "offline" si no hay actividad
            // durante un período de tiempo definido
            $esps = Esp::where('last_session', '<', Carbon::now()->subMinutes(30))// Por ejemplo, 30 minutos de inactividad
            ->where('status', 'online')
            ->get();

            // Marcar los dispositivos como "offline"
            foreach ($esps as $esp) {
                $esp->status = 'offline';
                $esp->save();
            }

        })->everyMinute(); 
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
