<?php

namespace App\Mail;

use App\Active_crops;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CropHarvest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $crop)
    {
        $this->name = $name;
        $this->crop = $crop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('sendreminder')
            ->subject("Crop Harvest Reminder")
            ->with([
                'name' => $this->name,
                'crop' => $this->crop,
            ]);

    }
}
