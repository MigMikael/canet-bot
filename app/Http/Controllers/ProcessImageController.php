<?php

namespace App\Http\Controllers;
use App\ProcessImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProcessImageController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $amount = $request->get('amount');
        $image = $request->file('image');

        $process_image = [
            'amount' => $amount,
            'process_image' => File::get($image)
        ];

        ProcessImage::create($process_image);

        return response()->json(['msg' => 'store data complete']);
    }
}
