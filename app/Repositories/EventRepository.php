<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventRepository implements EventRepositoryInterface
{
    public function getAllEvents($request)
    {
        // $title = $request->query('title') ?? '';
        // $venue = $request->query('venue') ?? '';
        // $event_date_greater_than = $request->query('event_date')['gt'] ?? '0000-01-01';
        // $event_date_less_than = $request->query('event_date')['lt'] ?? '3000-01-01';

        // return Event::where('title', 'LIKE', '%' . $title . '%')
        //     ->whereDate('end_date', '>=', $event_date_greater_than)->whereDate('end_date', '<=', $event_date_greater_than)->paginate(5);
        return Event::paginate(8);
    }

    public function storeEvent($request)
    {
        DB::transaction(function () use ($request) {

            if ($request->routeIs('admin.*')) {
                $user_id = null;
                $admin_id = Auth::guard('admin')->user()->id;
            } else {
                $user_id = Auth::user()->id;
                $admin_id = null;
            }

            Event::create([
                'title' => $request->title,
                'venue' => $request->venue,
                'content' => $request->content,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'admin_id' => $admin_id,
                'user_id' => $user_id,
            ]);
        });
    }

    public function updateEvent($request, $event)
    {
        DB::transaction(function () use ($request, $event) {
            $event->update($request->all());
        });
    }

    public function destroyEvent($event)
    {
        return Event::destroy($event->id);
    }
}
