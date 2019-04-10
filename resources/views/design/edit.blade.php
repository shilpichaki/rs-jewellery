@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
    <style>
        .table-bordered td {
            width: 60px !important;
        }
    </style>
@endsection
@section('content')
    <h2 class="text-center py-3">Edit Design</h2>
 <form id="add-deisgn-form" action="{{route('design.update-design', ['design' => $design->design_no])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <table class="table table-bordered" id="">
                        <tbody>
                        <tr>
                            <td class="ts">Design number:</td>
                            <td>
                                {{$design->design_no}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 text-center" style="border: 1px solid #aba2d6;background-color: #eaffab;">
                <div class="row">
                    <h6 class="pt-3 ts">Bangle Design</h6>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <div class="row p-2">
                    <div class="preview img-wrapper rounded" style="background-image: url({{asset($design->picture)}});background-size: cover; background-position:center">
                    </div>
                </div>
                <div class="row right-padding">
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Rhodium</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary input-required" value="{{$design->rhodium}}" id="rhodium" name="rhodium">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Misc. price</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary input-required" value="{{$design->misc_price}}" id="misc_price" name="misc_price">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Markup %</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary input-required" value="{{$design->markup_percentage}}" id="markup_percentage" name="markup_percentage">
                        </div>
                    </div>
                    <div class="col-sm-12 showPriceDivs">
                        <div class="row">
                            <label class="col-form-label ml-0"><b>Price (4pcs)</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12 showPriceDivs">
                        <div class="row">
                            <div class="form-control form-control-primary input-required" id="calcPrice4Pcs" style="height: 36px;">
                                <span>{{$design->price_4pcs}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <button type="button" class="btn btn-primary mt-3" id="calcPrice4PcsBtn" style="width: 100%">Calculate price</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="editableTable">
                            <thead>
                            <tr>
                                <th>Stone Size</th>
                                <th>Stone Type</th>
                                <th>Stone Color</th>
                                <th>2.2</th>
                                <th>2.4</th>
                                <th>2.6</th>
                                <th>2.8</th>
                                <th>2.10</th>
                                <th>Stone Price</th>
                                <th>Labour Charge</th>
                            </tr>
                            </thead>
                            <tbody id="append_parent">
                            @if($stonesCount > 0)
                                @foreach($design->stones as $key => $stone)
                                    <tr id="add_stone_row_{{$key}}" data-rowStoneType="<?php if ($stone->stone_type == "ROUND STONE") {
    echo 'round_stone';
} elseif ($stone->stone_type == "BIG STONE") {
    echo 'big_stone';
} elseif ($stone->stone_type == "TB STONE") {
    echo 'tb_stone';
} ?>">
                                        <td>
                                            <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][size]" required value="{{$stone->size}}">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-primary select-stone-dropdown" name="stones[{{$key}}][stone_type]">
                                                <option value="">SELECT STONE</option>
                                                @foreach($masterStones as $masterStone)
                                                    <option value="{{$masterStone}}"
                                                    @if($masterStone == $stone->stone_type)
                                                     selected 
                                                    @endif
                                                    >{{$masterStone}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control form-control-primary" name="stones[{{$key}}][stone_color]" id="">
                                                @foreach($masterColors as $masterColor)
                                                    <option value="{{$masterColor}}"
                                                    @if($masterColor == $stone->stone_color)
                                                     selected 
                                                    @endif
                                                    >{{$masterColor}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input data-stoneType="<?php if ($stone->stone_type == "ROUND STONE") {
    echo 'round_stone';
} elseif ($stone->stone_type == "BIG STONE") {
    echo 'big_stone';
} elseif ($stone->stone_type == "TB STONE") {
    echo 'tb_stone';
} ?>" data-bangleSize="2.2" class="form-control form-control-primary add_type_stone_22 input-required" type="text" name="stones[{{$key}}][quantity][0]" required pattern="\d+" title="" value="{{$stone->quantity[0]}}">
                                        </td>
                                        <td>
                                            <input data-stoneType="<?php if ($stone->stone_type == "ROUND STONE") {
    echo 'round_stone';
} elseif ($stone->stone_type == "BIG STONE") {
    echo 'big_stone';
} elseif ($stone->stone_type == "TB STONE") {
    echo 'tb_stone';
} ?>" data-bangleSize="2.4" class="form-control form-control-primary add_type_stone_24 input-required" type="text" name="stones[{{$key}}][quantity][1]" required pattern="\d+" value="{{$stone->quantity[1]}}">
                                        </td>
                                        <td>
                                            <input data-stoneType="<?php if ($stone->stone_type == "ROUND STONE") {
    echo 'round_stone';
} elseif ($stone->stone_type == "BIG STONE") {
    echo 'big_stone';
} elseif ($stone->stone_type == "TB STONE") {
    echo 'tb_stone';
} ?>" data-bangleSize="2.6" class="form-control form-control-primary add_type_stone_26 input-required" type="text" name="stones[{{$key}}][quantity][2]" required pattern="\d+" value="{{$stone->quantity[2]}}">
                                        </td>
                                        <td>
                                            <input data-stoneType="<?php if ($stone->stone_type == "ROUND STONE") {
    echo 'round_stone';
} elseif ($stone->stone_type == "BIG STONE") {
    echo 'big_stone';
} elseif ($stone->stone_type == "TB STONE") {
    echo 'tb_stone';
} ?>" data-bangleSize="2.8" class="form-control form-control-primary add_type_stone_28 input-required" type="text" name="stones[{{$key}}][quantity][3]" required pattern="\d+" value="{{$stone->quantity[3]}}">
                                        </td>
                                        <td>
                                            <input data-stoneType="<?php if ($stone->stone_type == "ROUND STONE") {
    echo 'round_stone';
} elseif ($stone->stone_type == "BIG STONE") {
    echo 'big_stone';
} elseif ($stone->stone_type == "TB STONE") {
    echo 'tb_stone';
} ?>" data-bangleSize="2.10" class="form-control form-control-primary add_type_stone_210 input-required" type="text" name="stones[{{$key}}][quantity][4]" required pattern="\d+" value="{{$stone->quantity[4]}}">
                                        </td>
                                        <td>
                                            <input class="form-control form-control-primary input-required" type="text" name="stones[{{$key}}][stone_price]" required title="Example: 500.00, 1000.70" value="{{$stone->stone_price}}">
                                        </td>
                                        <td>
                                            <input class="form-control form-control-primary input-required" type="text" name="stones[{{$key}}][labour_charge]" required title="Example: 500.00, 1000.70" value="{{$stone->labour_charge}}">
                                        </td>
                                        <td>
                                            <button type="button" data-id="{{$key}}" class="delete_row_btn btn btn-primary button button-small" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr id="noStonesYet">
                                    <td colspan="10" class="text-center">No Stones yet!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div class="col-sm-12">
                        <div class="row py-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary edit" id="submit_btn"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit</button>
                                <button type="button" class="btn btn-primary pull-right add-row" id="rowAddButton">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Row
                                </button>
                                <a href="{{route('design.show', ['design' => $design->design_no])}}" class="btn btn-success" id="cancle" style="margin-left:10px;"><i class="fa fa-window-close"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" colspan="6">TOTAL TYPEWISE STONE COUNT</th>
                            </tr>
                            <tr>
                                <th>Stone type</th>
                                <th class="text-center">2.2</th>
                                <th class="text-center">2.4</th>
                                <th class="text-center">2.6</th>
                                <th class="text-center">2.8</th>
                                <th class="text-center">2.10</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ROUND STONES</td>
                                <td class="text-right" id="total-round-stones-22">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][0]" value="{{$design->total_stone_count->round_stone[0]}}">
                                </td>
                                <td class="text-right" id="total-round-stones-24">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][1]" value="{{$design->total_stone_count->round_stone[1]}}">
                                </td>
                                <td class="text-right" id="total-round-stones-26">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][2]" value="{{$design->total_stone_count->round_stone[2]}}">
                                </td>
                                <td class="text-right" id="total-round-stones-28">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][3]" value="{{$design->total_stone_count->round_stone[3]}}">
                                </td>
                                <td class="text-right" id="total-round-stones-210">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][4]" value="{{$design->total_stone_count->round_stone[4]}}">
                                </td>
                            </tr>
                            <tr>
                                <td>BIG STONES</td>
                                <td class="text-right" id="total-big-stones-22">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][0]" value="{{$design->total_stone_count->big_stone[0]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-24">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][1]" value="{{$design->total_stone_count->big_stone[1]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-26">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][2]" value="{{$design->total_stone_count->big_stone[2]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-28">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][3]" value="{{$design->total_stone_count->big_stone[3]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-210">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][4]" value="{{$design->total_stone_count->big_stone[4]}}">
                                </td>
                            </tr>
                            <tr>
                                <td>TB STONES</td>
                                <td class="text-right" id="total-tb-stones-22">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][0]" value="{{$design->total_stone_count->tb_stone[0]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-24">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][1]" value="{{$design->total_stone_count->tb_stone[1]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-26">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][2]" value="{{$design->total_stone_count->tb_stone[2]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-28">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][3]" value="{{$design->total_stone_count->tb_stone[3]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-210">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][4]" value="{{$design->total_stone_count->tb_stone[4]}}">
                                </td>
                            </tr>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            
        </div>
    </div>
    </form>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var counter = {{$lastKey}};
            $("#rowAddButton").click(function () {

                $("#noStonesYet").css("display", "none");

                var content = '<tr id="add_stone_row_'+counter+'" data-rowstonetype="">';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required" type="text" name="stones['+counter+'][size]" required>';
                content += '</td>';
                
                content += '<td>';
                content +=      '<select class="form-control form-control-primary input-required select-stone-dropdown" name="stones['+counter+'][stone_type]" id="">';
                    content +=          '<option value="">SELECT STONE</option>'
                    @foreach($masterStones as $masterStone)
                    content +=          '<option value="{{$masterStone}}">{{$masterStone}}</option>';
                    @endforeach
                content +=      '</select>';
                content += '</td>';
                content += '<td>';
                content +=      '<select class="form-control form-control-primary input-required" name="stones['+counter+'][stone_color]" id="">';
                    @foreach($masterColors as $masterColor)
                    content +=          '<option value="{{$masterColor}}">{{$masterColor}}</option>';
                    @endforeach
                content +=      '</select>';
                content += '</td>';

                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required add_type_stone_22 form-disabler" data-stoneType="" data-bangleSize="2.2" type="text" name="stones['+counter+'][quantity][0]" required pattern="\\d+" title="">';
                content += '</td>';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required add_type_stone_24 form-disabler" data-stoneType="" data-bangleSize="2.4"  type="text" name="stones['+counter+'][quantity][1]" required pattern="\\d+">';
                content += '</td>';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required add_type_stone_26 form-disabler" data-stoneType="" data-bangleSize="2.6"  type="text" name="stones['+counter+'][quantity][2]" required pattern="\\d+">';
                content += '</td>';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required add_type_stone_28 form-disabler" data-stoneType="" data-bangleSize="2.8"  type="text" name="stones['+counter+'][quantity][3]" required pattern="\\d+">';
                content += '</td>';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required add_type_stone_210 form-disabler" data-stoneType="" data-bangleSize="2.10"  type="text" name="stones['+counter+'][quantity][4]" required pattern="\\d+">';
                content += '</td>';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required stone_add_foo" type="text" name="stones['+counter+'][stone_price]" required>';
                content += '</td>';
                content += '<td>';
                content +=      '<input class="form-control form-control-primary input-required" type="text" name="stones['+counter+'][labour_charge]" required title="Example: 500.00, 1000.70">';
                content += '</td>';
                content += '<td>';
                content +=      '<button type="button" data-id="'+counter+'" class="delete_row_btn btn btn-primary button button-small" title="Delete"><i class="fa fa-trash"></i></button>';
                content += '</td>';
                content += '</tr>';

                $("#append_parent").append(content);
                
                formDisabler($("#add_stone_row_"+counter));

                counter++;
            });
        });
        $(document).ready(function() {

        // calculate values
        var totalRoundStone22 = 0;
        var totalRoundStone24 = 0;
        var totalRoundStone26 = 0;
        var totalRoundStone28 = 0;
        var totalRoundStone210 = 0;

        var totalBigStone22 = 0;
        var totalBigStone24 = 0;
        var totalBigStone26 = 0;
        var totalBigStone28 = 0;
        var totalBigStone210 = 0;

        var totalTbStone22 = 0;
        var totalTbStone24 = 0;
        var totalTbStone26 = 0;
        var totalTbStone28 = 0;
        var totalTbStone210 = 0;

        $('body').on('keyup', '.add_type_stone_22', function() {
            totalRoundStone22 = 0;
            totalBigStone22 = 0;
            totalTbStone22 = 0;

            var inputValue = 0;

            $('input[data-stonetype="round_stone"][data-bangleSize="2.2"]').each(function() { // calculating total_round_stones_2.2

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalRoundStone22 += inputValue;
            });

            $('input[data-stonetype="big_stone"][data-bangleSize="2.2"]').each(function() { // calculating total_big_stones_2.2

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalBigStone22 += inputValue;
            });

            $('input[data-stonetype="tb_stone"][data-bangleSize="2.2"]').each(function() { // calculating total_tb_stones_2.2

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalTbStone22 += inputValue;
            });

            $("#total-round-stones-22").find('input').val(totalRoundStone22);
            $("#total-big-stones-22").find('input').val(totalBigStone22);
            $("#total-tb-stones-22").find('input').val(totalTbStone22);
        });

        $('body').on('keyup', '.add_type_stone_24', function() { // calculating total_round_stones_2.4
            totalRoundStone24 = 0;
            totalBigStone24 = 0;
            totalTbStone24 = 0;

            var inputValue = 0;

            $('input[data-stonetype="round_stone"][data-bangleSize="2.4"]').each(function() { // calculating total_round_stones_2.4

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalRoundStone24 += inputValue;
            });

            $('input[data-stonetype="big_stone"][data-bangleSize="2.4"]').each(function() { // calculating total_big_stones_2.4

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalBigStone24 += inputValue;
            });

            $('input[data-stonetype="tb_stone"][data-bangleSize="2.4"]').each(function() { // calculating total_tb_stones_2.4

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalTbStone24 += inputValue;
            });

            $("#total-round-stones-24").find('input').val(totalRoundStone24);
            $("#total-big-stones-24").find('input').val(totalBigStone24);
            $("#total-tb-stones-24").find('input').val(totalTbStone24);
        });

        $('body').on('keyup', '.add_type_stone_26', function() { // calculating total_round_stones_2.6
            totalRoundStone26 = 0;
            totalBigStone26 = 0;
            totalTbStone26 = 0;

            var inputValue = 0;

            $('input[data-stonetype="round_stone"][data-bangleSize="2.6"]').each(function() { // calculating total_round_stones_2.6

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalRoundStone26 += inputValue;
            });

            $('input[data-stonetype="big_stone"][data-bangleSize="2.6"]').each(function() { // calculating total_big_stones_2.6

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalBigStone26 += inputValue;
            });

            $('input[data-stonetype="tb_stone"][data-bangleSize="2.6"]').each(function() { // calculating total_tb_stones_2.6

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalTbStone26 += inputValue;
            });

            $("#total-round-stones-26").find('input').val(totalRoundStone26);
            $("#total-big-stones-26").find('input').val(totalBigStone26);
            $("#total-tb-stones-26").find('input').val(totalTbStone26);
        });

        $('body').on('keyup', '.add_type_stone_28', function() { // calculating total_round_stones_2.8
            totalRoundStone28 = 0;
            totalBigStone28 = 0;
            totalTbStone28 = 0;

            var inputValue = 0;

            $('input[data-stonetype="round_stone"][data-bangleSize="2.8"]').each(function() { // calculating total_round_stones_2.8

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalRoundStone28 += inputValue;
            });

            $('input[data-stonetype="big_stone"][data-bangleSize="2.8"]').each(function() { // calculating total_big_stones_2.8

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalBigStone28 += inputValue;
            });

            $('input[data-stonetype="tb_stone"][data-bangleSize="2.8"]').each(function() { // calculating total_tb_stones_2.8

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalTbStone28 += inputValue;
            });

            $("#total-round-stones-28").find('input').val(totalRoundStone28);
            $("#total-big-stones-28").find('input').val(totalBigStone28);
            $("#total-tb-stones-28").find('input').val(totalTbStone28);
        });

        $('body').on('keyup', '.add_type_stone_210', function() { // calculating total_round_stones_2.10
            totalRoundStone210 = 0;
            totalBigStone210 = 0;
            totalTbStone210 = 0;

            var inputValue = 0;

            $('input[data-stonetype="round_stone"][data-bangleSize="2.10"]').each(function() { // calculating total_round_stones_2.10

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalRoundStone210 += inputValue;
            });

            $('input[data-stonetype="big_stone"][data-bangleSize="2.10"]').each(function() { // calculating total_big_stones_2.10

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalBigStone210 += inputValue;
            });

            $('input[data-stonetype="tb_stone"][data-bangleSize="2.10"]').each(function() { // calculating total_tb_stones_2.10

                inputValue = $(this).val() == '' ? 0 : $(this).val();
                inputValue = parseInt(inputValue);

                totalTbStone210 += inputValue;
            });

            $("#total-round-stones-210").find('input').val(totalRoundStone210);
            $("#total-big-stones-210").find('input').val(totalBigStone210);
            $("#total-tb-stones-210").find('input').val(totalTbStone210);
        });

        // change row type to stone type

        $('body').on('change', '.select-stone-dropdown', function() {
            
            var stoneType = $(this).val();

            if(stoneType != '') {
                parentTr = $(this).closest('tr');
                formEnabler(parentTr);
            } else {
                formDisabler(parentTr);
            }

                switch(stoneType) {
                    case 'ROUND STONE':
                        $(this).closest('tr').find('input').attr('data-stonetype', 'round_stone');
                        parentTr.attr('data-rowStoneType', 'round_stone');
                    break;
                    case 'BIG STONE':
                        $(this).closest('tr').find('input').attr('data-stonetype', 'big_stone');
                        parentTr.attr('data-rowStoneType', 'big_stone');
                    break;
                    case 'TB STONE':
                        $(this).closest('tr').find('input').attr('data-stonetype', 'tb_stone');
                        parentTr.attr('data-rowStoneType', 'tb_stone');
                    break;
                    default:
                        $(this).closest('tr').find('input').attr('data-stonetype', '');
                }
            });
        });
    </script>

    <script type="text/javascript">
        // delete row
        $(document).ready(function() {
            var dataId  = 0; 
            $('body').on('click','.delete_row_btn',function(){

                dataId = $(this).attr('data-id');

                if($("#add_stone_row_"+dataId).attr("data-rowstonetype") != "") {
                    deductStoneCount($("#add_stone_row_"+dataId));
                }

                $("#add_stone_row_"+dataId).remove();
            });
        });
    </script>
    <script type="text/javascript">
        function formDisabler(parentElement)
        {
            var childs = parentElement.find(".form-disabler");
            
            childs.prop('disabled', true);
        }

        function formEnabler(parentElement)
        {
            var childs = parentElement.find(".form-disabler");
            
            childs.prop('disabled', false);
        }

        function deductStoneCount(row)
        {
            var rowStoneType = row.attr('data-rowstonetype');
            var rowStoneType = rowStoneType.replace("_", "-"); 

            var removedRow22 = row.find('input[data-bangleSize="2.2"]').val();
            var removedRow24 = row.find('input[data-bangleSize="2.4"]').val();
            var removedRow26 = row.find('input[data-bangleSize="2.6"]').val();
            var removedRow28 = row.find('input[data-bangleSize="2.8"]').val();
            var removedRow210 = row.find('input[data-bangleSize="2.10"]').val();

            var prevValue22 = $('#total-'+rowStoneType+'s-22').find('input').val();
            var prevValue24 = $('#total-'+rowStoneType+'s-24').find('input').val();
            var prevValue26 = $('#total-'+rowStoneType+'s-26').find('input').val();
            var prevValue28 = $('#total-'+rowStoneType+'s-28').find('input').val();
            var prevValue210 = $('#total-'+rowStoneType+'s-210').find('input').val();
            
            var currentValue22 = ((prevValue22 - removedRow22) < 0) ? 0 : prevValue22 - removedRow22;
            $('#total-'+rowStoneType+'s-22').find('input').val(currentValue22);
            
            var currentValue24 = ((prevValue24 - removedRow24) < 0) ? 0 : prevValue24 - removedRow24;
            $('#total-'+rowStoneType+'s-24').find('input').val(currentValue24);

            var currentValue26 = ((prevValue26 - removedRow26) < 0) ? 0 : prevValue26 - removedRow26;
            $('#total-'+rowStoneType+'s-26').find('input').val(currentValue26);
            
            var currentValue28 = ((prevValue28 - removedRow28) < 0) ? 0 : prevValue28 - removedRow28;
            $('#total-'+rowStoneType+'s-28').find('input').val(currentValue28);
            
            var currentValue210 = ((prevValue210 - removedRow210) < 0) ? 0 : prevValue210 - removedRow210;
            $('#total-'+rowStoneType+'s-210').find('input').val(currentValue210);

            /*on deleting a row calculation*/
            console.log(" => Deleted a row => ");
            console.log(removedRow22+'-'+removedRow24+'-'+removedRow26+'-'+removedRow28+'-'+removedRow210);
            console.log(prevValue22+'-'+prevValue24+'-'+prevValue26+'-'+prevValue28+'-'+prevValue210);
            console.log("----------")
            console.log(currentValue22+'-'+currentValue24+'-'+currentValue26+'-'+currentValue28+'-'+currentValue210);
            console.log(" =< Deleted a row =< ");
            /*on deleting a row calculation*/
        }
        $("#calcPrice4PcsBtn").click(function() {
            var show = checkIfEverythingFilledUp();

            if(show == 1) {
                var formData = $('#add-deisgn-form').serialize();
                
                $.ajax({
                    url: '{{env('ROOT_URL')}}/api/design/calculate-price',
                    type: "POST",
                    data : formData,
                    error: function () {
                    },
                    success: function (data) {
                        var price = data.data.price;

                        price = price.toFixed(2);

                        $("#calcPrice4Pcs").find("span").html(price);
                        $(".showPriceDivs").show();
                    }
                });
            } else if (show == 0) {
                $(".showPriceDivs").hide();
            }
        });

        function checkIfEverythingFilledUp()
        {
            status = 1;
            $("input.input-required").each(function() {
                if($(this).val() == '') {
                    $(this).addClass("border-danger");

                    if(status == 1) {
                        status = 0;
                    }
                } else {
                    $(this).removeClass("border-danger");               
                }
            });

            return status;
        }
    </script>
@endsection
