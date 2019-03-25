<?php

namespace App\Http\Controllers;

use Auth;
use App\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DesignAadhaarRequest;

class DesignController extends Controller
{
    public function addDesign()
    {
        $data = [
            'design_no' => 422,
            'picture' => 'foo.jpg',
            'stones' => [
                [
                    'size' => '1.50',
                    'type' => 'ROUND STONE',
                    'quantity' => [
                        '2.2' => 10,
                        '2.4' => 10,
                        '2.6' => 10,
                        '2.8' => 10,
                        '2.10' => 10
                    ],
                    'price' => 50.50
                ]
            ]
        ];

    	return view('design.add-design')
            ->withData($data);
    }

    public function store(DesignAadhaarRequest $request)
    {
        $file = request()->file('picture');

        $ext = $file->extension();

        $path = $file->storeAs('pictures/', Auth::user()->id . time() . '.' . $ext);

        $path = 'storage/'.$path;

        $validated = $request->validated();

        $design = Design::create([
            'picture' => $path,
            'design_no' => $request->design_no,
            'stones' => json_encode($request->stones)
        ]);

        return $design;
    }
}
