<?php

namespace App\Http\Controllers;
use App\ProcessImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProcessImageController extends Controller
{
    public function index()
    {
        $process_images = ProcessImage::all();
        return view('process_image', ['process_images' => $process_images]);
    }

    public function store(Request $request)
    {
        $amount = $request->get('amount');
        $image = $request->file('image');

        $process_image = [
            'amount' => $amount,
            'image' => File::get($image)
        ];

        ProcessImage::create($process_image);

        return response()->json(['msg' => 'store data complete']);
    }

    public function store2(Request $request)
    {
        $amount = $request->get('amount');
        $process_image = [
            'amount' => $amount,
        ];

        ProcessImage::create($process_image);

        return response()->json(['msg' => 'store data complete']);
    }

    public function store3(Request $request)
    {
        $amount = $request-get('amount');
        $process_image = [
            'amount' => $amount,
        ];

        ProcessImage::create($process_image);

        return response()->json(['msg' => 'store data complete']);
    }

    public function getImage($id)
    {
        $pi = ProcessImage::findOrFail($id);
        return response($pi->image)->header('Content-Type', 'image/jpg');
    }
}
