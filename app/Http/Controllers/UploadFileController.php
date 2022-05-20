<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('uploadFile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()-> validate([
            'file' => 'required|mimes:mp3,mp4|max:2048',
        ]);
        if ($files = $request->file('file')){
            $file = $request->file->store('app/uploaded');
            return Response()->json([
                "success" => true,
                "file" => $file
            ]);

        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UploadFile  $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function show(UploadFile $uploadFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UploadFile  $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadFile $uploadFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UploadFile  $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadFile $uploadFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadFile  $uploadFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadFile $uploadFile)
    {
        //
    }
}
