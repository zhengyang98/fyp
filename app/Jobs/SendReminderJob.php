<?php

namespace App\Jobs;

use App\Active_crops;
use App\Mail\CropHarvest;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $active_crops = Active_crops::all();
        $now = time();

        foreach($active_crops as $active_crop){
            $end = strtotime($active_crop->end_time);
            if($end-time()<=259200){//check if remaining duration is 3 days
                $id = $active_crop->farmer_id;
                $user_email = DB::table('users')->select('email')->where('id', $id)->value('email');
                $user_name = DB::table('users')->select('name')->where('id', $id)->value('name');
                $crop_name =$active_crop->crop_name;
                Mail::to($user_email)->send(new CropHarvest($user_name, $crop_name));
            }
        }


    }
}
