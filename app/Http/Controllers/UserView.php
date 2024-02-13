<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Event;
use App\Models\News;
use App\Models\Notice;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class UserView extends Controller
{

    public function home()
    {
        $news = News::orderBy('created_at', 'desc')->limit(5)->get();
        $events = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $notices = Notice::orderBy('created_at', 'desc')->limit(5)->get();
        $resources = Download::orderBy('created_at', 'desc')->limit(5)->get();
        return view("home", ['news' => $news, 'events' => $events, 'notices' => $notices, 'resources' => $resources]);
    }

    public function blogs()
    {
        $blogs = News::orderBy('created_at', 'desc')->paginate(3);
        $events = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $notices = Notice::orderBy('created_at', 'desc')->limit(5)->get();
        $resources = Download::orderBy('created_at', 'desc')->limit(5)->get();
        return view('blogs', ['blogs' => $blogs, 'events' => $events, 'notices' => $notices, 'resources' => $resources]);
    }

    public function blog(String $blog)
    {
        $blog = News::findOrFail($blog);
        $blogs = News::orderBy('created_at', 'desc')->limit(5)->get();
        $events = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $notices = Notice::orderBy('created_at', 'desc')->limit(5)->get();
        $resources = Download::orderBy('created_at', 'desc')->limit(5)->get();
        return view('blog', ['blog' => $blog, 'blogs' => $blogs, 'events' => $events, 'notices' => $notices, 'resources' => $resources]);
    }

    public function events(Request $request)
    {
        // dd($request);
        // dd($request->get('title'));
        $qTitle = $request->input('title') ?? '';
        $qStart = $request->query('event_date')['gt']  ?? '0000-01-01';
        $qEnd = $request->input('event_date')['lt']  ?? '3000-01-01';

        // dd($qTitle, $qEnd, $qStart);

        $blogs = News::orderBy('created_at', 'desc')->limit(5)->get();
        $events =  Event::where('title', 'LIKE', '%' . $qTitle . '%')
            ->whereDate('start_date', '>=', $qStart)
            ->whereDate('end_date', '<=', $qEnd)
            ->paginate(5);

        $notices = Notice::orderBy('created_at', 'desc')->limit(5)->get();
        $resources = Download::orderBy('created_at', 'desc')->limit(5)->get();
        return view('events', ['blogs' => $blogs, 'events' => $events, 'notices' => $notices, 'resources' => $resources]);
    }

    public function event(String $event)
    {
        $event = Event::findOrFail($event);
        $blogs = News::orderBy('created_at', 'desc')->limit(5)->get();
        $events = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $notices = Notice::orderBy('created_at', 'desc')->limit(5)->get();
        $resources = Download::orderBy('created_at', 'desc')->limit(5)->get();
        return view('event', ['event' => $event, 'blogs' => $blogs, 'events' => $events, 'notices' => $notices, 'resources' => $resources]);
    }

    public function notices()
    {
        $blogs = News::orderBy('created_at', 'desc')->limit(5)->get();
        $events = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $notices = Notice::orderBy('created_at', 'desc')->paginate(5);
        $resources = Download::orderBy('created_at', 'desc')->limit(5)->get();
        return view('notices', ['blogs' => $blogs, 'events' => $events, 'notices' => $notices, 'resources' => $resources]);
    }

    // public function notice()
    // {
    // }

    public function downloadNotice(String $notice)
    {
        $notices = Notice::findOrFail($notice);
        return Storage::download('public/notices_downloads/' . $notices->notice_file);
    }
    public function downloadResources(String $resource)
    {
        $resources = Download::findOrFail($resource);
        return Storage::download('public/files/' . $resources->download_file);
    }
}
