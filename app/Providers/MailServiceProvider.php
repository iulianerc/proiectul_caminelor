<?php


namespace App\Providers;


use Carbon\Laravel\ServiceProvider;
use Illuminate\Mail\MailManager;
use Swift_Mailer;
use Swift_SmtpTransport;

class MailServiceProvider extends ServiceProvider
{
    //protected bool $defer = true;

    public function register(): void
    {
        $this->app->bind('project.swift_mailer', static function ($app, $parameters) {
            $transport = new Swift_SmtpTransport($parameters['host'], $parameters['port']);
            $transport->setUsername($parameters['login']);
            $transport->setPassword($parameters['password']);
            $transport->setEncryption('tls');

            return new Swift_Mailer($transport);
        });

        $this->app->singleton('mail.manager', function ($app) {
            return new MailManager($app);
        });

        $this->app->bind('mailer', function ($app) {
            return $app->make('mail.manager')->mailer();
        });
    }

}
