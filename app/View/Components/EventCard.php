<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    public $eventRequest;

    public function __construct($eventRequest)
    {
        $this->eventRequest = $eventRequest;
    }

    public function render()
    {
        return view('components.event-card');
    }
}
