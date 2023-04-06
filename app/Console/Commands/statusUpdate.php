<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Illuminate\Support\Carbon;

class statusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:statusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User status update';

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
        $currentDate = Carbon::now()->format('Y-m-d');
        $events = Event::all();
        foreach($events as $eventList){
            $userDate = Carbon::parse($eventList->date);
            if($eventList->date ===  $currentDate){
                $eventData = Event::where('id',$eventList->id)->update(['status'=>3]);
            }
        }
        \Log::info($currentDate);
        \Log::info($eventList->date);
    }
}
