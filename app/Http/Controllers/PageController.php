<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests\DownloadFileRequest;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('pbweb.token')->only('download');
        $this->middleware('pbweb.downloadfile')->only('download');
    }
    function pb(Request $request)
    {
        $version = $request->input('version');
        $level = 54;
        return view(
            'pb',
            [
                'version' => $version,
                'level' => $level
            ]
        );
    }

    function download($id, DownloadFileRequest $request)
    {

        return $this->downloadFile();
    }
}
