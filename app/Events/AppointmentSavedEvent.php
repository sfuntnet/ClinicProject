<?php

namespace App\Events;

use App\Models\Appointment as Model;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentSavedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
