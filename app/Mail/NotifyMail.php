<?php

namespace App\Mail;

use App\Models\SiteInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected  $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info = SiteInfo::first();
        return $this->subject($info->name)
                    ->view('frontend.notifyMail')->with('details', $this->details);
    }
}
