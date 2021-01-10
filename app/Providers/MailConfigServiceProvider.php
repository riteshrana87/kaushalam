<?php

namespace App\Providers;

use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('smtp_information')) {
            $mail = DB::table('smtp_information')->first();
            if ($mail) //checking if table is not empty
            {
                $smtp = array(
                    'transport' => 'smtp',
                    'host' => $mail->smtp_host,
                    'port' => $mail->smtp_port,
                    'encryption' => $mail->smtp_encryption,
                    'username' => $mail->username,
                    'password' => $mail->smtp_password,
                    //'timeout' => null,
                    //'auth_mode' => null,
                 );
                 
                Config::set('mail.mailers.smtp', $smtp);

                $from = array(
                    'address' => $mail->from_email,
                    'name' => $mail->from_name,
                );

                Config::set('mail.from', $from);
                
            }
        }
    }
}
?>