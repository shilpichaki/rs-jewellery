<?php

namespace App\Http\Controllers;

use Auth;
use App\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DesignAadhaarRequest;
use App\Http\Requests\DesignAadhaarUpdateRequest;

class DesignController extends Controller
{
    public function index()
    {
        return view('design.index')
            ->withDesigns(Design::all());
    }
    public function addDesign()
    {
    	return view('design.add-design');
    }

    public function show(Design $design)
    {
        $design['stones'] = json_decode($design['stones']);

        return view('design.show')
            ->with(['design' => $design]);
    }

    public function edit(Design $design)
    {
        $design['stones'] = json_decode($design['stones']);
        $lastKey = 0;

        foreach ($design['stones'] as $key => $value) {
            $lastKey = $key;
        }
        $lastKey++;
         
        return view('design.edit')
            ->with(['design' => $design, 'lastKey' => $lastKey]);
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

        return redirect()->route('design.show', ['design' => $design->design_no]);
    }

    public function update(Design $design, DesignAadhaarUpdateRequest $request) {
        $validated = $request->validated();

        $design->stones = json_encode($request->stones);
        $design->update();
        
        return redirect()->route('design.show', ['design' => $design->design_no]);
    }
}
