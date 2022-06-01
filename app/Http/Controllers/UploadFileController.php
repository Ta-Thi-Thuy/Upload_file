<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use GuzzleHttp\Promise\Create;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $files = UploadFile::all();
//        dd(json_decode($files));
        return view('uploadFile', compact('files'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadFile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function store(Request $request)
    {
        if ($files = $request->file('file')) {
            $path = $request->file('file')->store('uploaded');
            $name = $request->file('file')->getClientOriginalName();
            $size = $request->file('file')->getSize();
            $type = $request->file('file')->getMimeType();
            $files->move(storage_path('files'), $name);

            $uploadFile = new UploadFile();
            $uploadFile->name = $name;
            $uploadFile->ext = $type;
            $uploadFile->size = $size;
            $uploadFile->path = $path;
            $uploadFile->save();
            return response()->json(['success' => $name]);
        }
        return response()->json([
            "success" => false,
            "file" => ''
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        UploadFile::where('name', $filename)->delete();
        return $filename;

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\UploadFile $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function show(UploadFile $uploadFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UploadFile $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadFile $uploadFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UploadFile $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadFile $uploadFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UploadFile $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadFile $uploadFile)
    {
        //
    }
}
