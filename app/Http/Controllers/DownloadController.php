<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $data = Download::latest()->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="download/' . $row['id'] . '/edit" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-id="' . $row['id'] . '" onclick="deleteData(' . $row['id'] . ')"  class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('download.index');

        // $download = Download::all();

        // return view('download.index', ['downloads' => $download]);
    }


    public function create()
    {
        //

        return view('download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDownloadRequest $request)
    {
        //

        if ($request->has('download_file')) {
            $file = $request->file('download_file');
            $name = $file->getClientOriginalName();
            $name = substr($name, 0, strpos($name, '.'));
            $extension = $file->getClientOriginalExtension();
            $filename = $name . time() . '.' . $extension;
            $path = public_path("storage/") . "files/";
            $file->move($path, $filename);
        }

        $data = [
            'title' => $request->title,
            'download_file' => $filename,
            'user_id' => Auth::user()->id,
        ];

        $downloadData = Download::create($data);

        return redirect()->route('admin.download.index')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        //
        $path = public_path("storage/") . "files/";

        $fileType = Storage::mimeType($path . $download->download_file);
        dd($path . $download->download_file);
        return response()->file($path . $download->download_file, [
            'Content-Type' => 'application/pdf'
        ]);
        return view('admin.download.show', ['download' => $download]);
    }

    public function download(String $download)
    {
        $down = Download::find($download);
        // dd($down);
        // dd($down->download_file);
        $path = public_path("storage/") . "files/";

        return response()->download($path . $down->download_file);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        //
        return view('download.edit', ['download' => $download]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDownloadRequest $request, Download $download)
    {

        if ($request->hasFile('download_file')) {
            $file = $request->file('download_file');
            $name = $file->getClientOriginalName();
            $name = substr($name, 0, strpos($name, '.'));

            $extension = $file->getClientOriginalExtension();
            $filename = $name . time() . '.' . $extension;
            $path = public_path("storage/") . "files/";
            $file->move($path, $filename);
            Storage::delete("public/files/" . $download->download_file);
            $download->update([
                'title' => $request->title,
                'download_file' => $filename,
            ]);
        } else {
            $download->update([
                'title' => $request->title,
            ]);
        }

        return redirect()->route('admin.download.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        //

        Storage::delete("public/files/" . $download->download_file);

        Download::destroy($download->id);
        return redirect()->route('admin.download.index');
    }
}
