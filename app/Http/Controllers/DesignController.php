<?php

namespace App\Http\Controllers;

use Auth;
use App\Design;
use App\StonesRow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DesignAadhaarRequest;
use App\Http\Requests\DesignAadhaarUpdateRequest;
use App\Enums\StoneColor;
use App\Enums\RawMaterial;

class DesignController extends Controller
{
    public function index()
    {
        return view('design.index')
            ->withDesigns(Design::all());
    }
    public function addDesign()
    {
    	return view('design.add-design')->with([
                'stones' => RawMaterial::getStoneTypes(),
                'colors' => StoneColor::getAllColors()
            ]);;
    }

    public function show(Design $design)
    {
        $design['stones'] = json_decode($design['stones']);
        
        $design['stones'] = (array) $design['stones'];

        $design['total_stone_count'] = json_decode($design['total_stone_count']);

        $stonesCount = $design['stones'] ==  null ? 0 : sizeof($design['stones']);

        return view('design.show')
            ->with([
                'design' => $design,
                'colors' => StoneColor::getAllColors(),
                'stonesCount' => $stonesCount,
            ]);
    }

    public function edit(Design $design)
    {
        $design['stones'] = json_decode($design['stones']);
        
        $design['stones'] = (array) $design['stones'];

        $design['total_stone_count'] = json_decode($design['total_stone_count']);

        $stonesCount = $design['stones'] ==  null ? 0 : sizeof($design['stones']);

        $lastKey = 0;

        if($stonesCount > 0) {
            foreach ($design['stones'] as $key => $value) {
                $lastKey = $key;
            }
        }

        $lastKey++;

        return view('design.edit')
            ->with([
                'design' => $design, 
                'lastKey' => $lastKey,
                'masterStones' => RawMaterial::getStoneTypes(),
                'masterColors' => StoneColor::getAllColors(),
                'stonesCount' => $stonesCount,
            ]);
    }

    public function store(DesignAadhaarRequest $request)
    {
        $file = request()->file('picture');

        $ext = $file->extension();

        $path = $file->storeAs('pictures/', Auth::user()->id . time() . '.' . $ext);

        $path = 'storage/'.$path;

        $validated = $request->validated();

        $price4pcs = StonesRow::calculatePrice4Pcs(
            $request->stones, $request->rhodium, $request->misc_price, $request->markup_percentage
        );

        $design = Design::create([
            'design_no' => $request->design_no,
            'rhodium' => $request->rhodium,
            'misc_price' => $request->misc_price,
            'markup_percentage' => $request->markup_percentage,
            'price_4pcs' => $price4pcs,
            'stones' => json_encode($request->stones),
            'total_stone_count' => json_encode($request->total_stone_count),
            'picture' => $path,
        ]);

        $design['stones'] = json_decode($design['stones']);
        $design['total_stone_count'] = json_decode($design['total_stone_count']);

        return redirect()->route('design.show', ['design' => $design->design_no]);
    }

    public function update(Design $design, DesignAadhaarUpdateRequest $request) {

        $validated = $request->validated();
        
        $price4pcs = StonesRow::calculatePrice4Pcs(
            $request->stones, $request->rhodium, $request->misc_price, $request->markup_percentage
        );

        $design->rhodium = $request->rhodium;
        $design->misc_price = $request->misc_price;
        $design->markup_percentage = $request->markup_percentage;
        $design->price_4pcs = $price4pcs;
        $design->stones = json_encode($request->stones);
        $design->total_stone_count = json_encode($request->total_stone_count);

        $design->update();
        
        return redirect()->route('design.show', ['design' => $design->design_no]);
    }
}
