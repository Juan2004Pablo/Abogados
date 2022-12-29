<?php

namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventRepository extends BaseRepository
{
    public function getModel(): Event
    {
        return new Event();
    }

    public function getAllEvents(): Collection
    {
        return Event::select('id', 'title', 'participants', 'description', 'date', 'start', 'finish', 'user_id',
            'location')->get();
    }

    public function createEvent(Request $data): void
    {
        $event = $this->getModel();

        $event->title = $data->title;
        $event->participants = $data->participants;
        $event->description = $data->description;
        $event->date = $data->date;
        $event->start = $data->start;
        $event->finish = $data->finish;
        $event->location = $data->location;
        $event->user_id = Auth::id();

        $event->save();
    }

    public function updateEvent(Request $data, Event $event): void
    {
        $event->title = $data->title;
        $event->participants = $data->participants;
        $event->description = $data->description;
        $event->date = $data->date;
        $event->start = $data->start;
        $event->finish = $data->finish;
        $event->location = $data->location;

        $event->save();

        Log::channel('contlog')->info('The user '.Auth::user()->name.' with id '.Auth::id().' updated the event with id '.$event->id);
    }

    public function deleteEvent(Event $event): void
    {
        $event->delete();
    }
}
