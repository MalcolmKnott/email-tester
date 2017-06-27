<?php

namespace Malcolmknott\Emailtester\Console;

use Malcolmknott\Emailtester\Mail\TestEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-email {email : Email address} {count : Number of emails to send}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test email';

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
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        $count = $this->argument('count');

        if ($count > config('emailtester.max')) {
            return $this->error('That\'s a lot of test emails ! Update email-tester.php config file to increase the limit.');
        }

        for ($i = 0; $i < $count; $i++) {
            Mail::to($email)->queue(new TestEmail());
        }

        $this->info($count . ' email sent to ' . $email);
    }
}
