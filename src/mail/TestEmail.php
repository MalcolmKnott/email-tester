<?php

namespace Malcolmknott\Emailtester\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject(
                        'Test Email From ' . config('app.name') . ' - ' .
                        ucwords(config('app.env')) . ' - ' .
                        Carbon::now()->toDateTimeString()
                    )
                    ->text('emailtester::emails.test_email');
    }
}
