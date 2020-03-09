<?php

namespace App\Notifications;


use Spatie\Backup\Notifications\Notifications\BackupHasFailed as BaseNotification;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class BackupHasFailed extends BaseNotification
{
    public function via(): array
    {
        return [PusherChannel::class];
    }

    public function toPushNotification($notifiable)
    {
        return PusherMessage::create()
            ->iOS()
            ->badge(1)
            ->sound('fail')
            ->body("The backup of {$this->getApplicationName()} to disk {$this->getDiskName()} has failed");
    }
}
