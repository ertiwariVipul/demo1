<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use App\Models\Event;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $currentDate = Carbon::now()->format('Y-m-d');
            $currentTime = Carbon::now()->format('H:i:s');
            $events = Event::get();
            foreach($events as $eventList){
                
                // if($eventList->date ===  $currentDate){
                    // $eventData = Event::where('date','<',$currentDate)->where('endTime','<',$currentTime)->update(['status'=>3]);
                    $eventData = Event::where('date','<',$currentDate)->update(['status'=>3]);
                // }
            }
           info($currentTime);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
