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
        // json_decode
        $design['stones'] = json_decode($design['stones']);
        $design['total_stone_count'] = json_decode($design['total_stone_count']);
        
        // cast object to array        
        $design['stones'] = (array) $design['stones'];

        // get stones count
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
        // json decode
        $design['stones'] = json_decode($design['stones']);
        $design['total_stone_count'] = json_decode($design['total_stone_count']);
        
        // cast object to array
        $design['stones'] = (array) $design['stones'];

        // get stones count
        $stonesCount = $design['stones'] ==  null ? 0 : sizeof($design['stones']);

        // get last inserted row key
        $lastRowKey = StonesRow::getLastRowKey($design['stones']);

        return view('design.edit')
            ->with([
                'design' => $design, 
                'lastKey' => $lastRowKey,
                'masterStones' => RawMaterial::getStoneTypes(),
                'masterColors' => StoneColor::getAllColors(),
                'stonesCount' => $stonesCount,
            ]);
    }

    public function store(DesignAadhaarRequest $request)
    {
        $validated = $request->validated();

        // storing picture
        $file = request()->file('picture');
        $ext = $file->extension();
        $path = $file->storeAs('pictures/', Auth::user()->id . time() . '.' . $ext);
        $path = 'storage/'.$path;

        // calculating price
        $price4pcs = StonesRow::calculatePrice4Pcs(
            $request->stones, $request->rhodium, $request->misc_price, $request->markup_percentage
        );

        // getting unique stone colors
        $stoneColors = StonesRow::getAllStoneColors($request->stones);
        $uniqueStoneColors = StoneColor::getUniqueStoneColors($stoneColors);

        // storing design
        $design = Design::create([
            'design_no' => $request->design_no,
            'rhodium' => $request->rhodium,
            'misc_price' => $request->misc_price,
            'markup_percentage' => $request->markup_percentage,
            'price_4pcs' => $price4pcs,
            'stones' => json_encode($request->stones),
            'total_stone_count' => json_encode($request->total_stone_count),
            'picture' => $path,
            'unique_stone_colors' => json_encode($uniqueStoneColors)
        ]);

        // redirecting to design show page
        return redirect()->route('design.show', ['design' => $design->design_no]);
    }

    public function update(Design $design, DesignAadhaarUpdateRequest $request) 
    {
        $validated = $request->validated();
        
        // calculating price
        $price4pcs = StonesRow::calculatePrice4Pcs(
            $request->stones, $request->rhodium, $request->misc_price, $request->markup_percentage
        );

        // getting unique stone colors
        $stoneColors = StonesRow::getAllStoneColors($request->stones);
        $uniqueStoneColors = StoneColor::getUniqueStoneColors($stoneColors);

        // updating design
        $design->rhodium = $request->rhodium;
        $design->misc_price = $request->misc_price;
        $design->markup_percentage = $request->markup_percentage;
        $design->price_4pcs = $price4pcs;
        $design->stones = json_encode($request->stones);
        $design->total_stone_count = json_encode($request->total_stone_count);
        $design->unique_stone_colors = json_encode($uniqueStoneColors);

        $design->update();
        
        // redirecting to design show page
        return redirect()->route('design.show', ['design' => $design->design_no]);
    }
}
