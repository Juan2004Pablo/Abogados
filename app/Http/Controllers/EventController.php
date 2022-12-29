<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Repositories\Event\EventRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    protected $eventRepo;

    public function __construct(EventRepository $repository)
    {
        $this->eventRepo = $repository;
    }

    public function index(): View
    {
        $events = $this->eventRepo->getAllEvents();

        return view('admin.event.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.event.create');
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $this->eventRepo->createEvent($request);

        return redirect()->route('home')
            ->with('status_success', 'event created successfully');
    }

    public function show(Event $event): View
    {
        return view('admin.event.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $this->eventRepo->updateEvent($request, $event);

        return redirect()->route('home')
            ->with('status_success', 'event update successfully');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $this->eventRepo->deleteEvent($event);

        return redirect()->route('home')
            ->with('notice', 'The user has been deleted correctly');
    }
}
