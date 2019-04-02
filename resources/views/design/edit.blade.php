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
 <form action="{{route('design.update-design', ['design' => $design->design_no])}}" method="POST" enctype="multipart/form-data">
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
            <div class="col-md-3">
                <div class="row p-2">
                    <div class="preview img-wrapper rounded" style="background-image: url({{asset($design->picture)}});background-size: cover; background-position:center">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Rhodium</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary" value="" id="rhodium" name="rhodium">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Misc. price</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary" value="" id="misc_price" name="misc_price">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Markup %</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary" value="" id="markup_percentage" name="markup_percentage">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row text-left">
                            <label class="col-form-label ml-0"><b>Price(4 pcs)</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control form-control-primary" value="" id="price_4pcs" name="price_4pcs">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
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
                            @foreach($design->stones as $key => $stone)
                                <tr id="add_stone_row_0">
                                    <td>
                                        <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][size]" pattern="\d+.\d{2}" title="Example: 1.26, 1.80" value="{{$stone->size}}" required>
                                    </td>
                                    <td>
                                        <select class="form-control form-control-primary" name="stones[{{$key}}][type]" id="">
                                            @foreach($masterStones as $masterStone)
                                                <option value="{{$masterStone}}" 
                                                @if($masterStone == $stone->stone_type)
                                                 selected 
                                                @endif
                                                >
                                                {{$masterStone}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][quantity][0]" required pattern="\d+" title="" value="{{$stone->quantity[0]}}">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][quantity][1]" required pattern="\d+" value="{{$stone->quantity[1]}}">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][quantity][2]" required pattern="\d+" value="{{$stone->quantity[2]}}">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][quantity][3]" required pattern="\d+" value="{{$stone->quantity[3]}}">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-primary" type="text" name="stones[{{$key}}][quantity][4]" required pattern="\d+" value="{{$stone->quantity[4]}}">
                                    </td>
                                    <td><input class="form-control form-control-primary" type="text" name="stones[{{$key}}][price]" required pattern="\d+.\d{2}" value="{{$stone->stone_price}}" title="Example: 500.00, 1000.70"></td>
                                    <td>
                                        <button type="button" data-id="0" class="delete_row_btn btn btn-primary button button-small" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
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
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][0]" value="{{$design->total_stone_count->round_stone[0]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-24">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][1]" value="{{$design->total_stone_count->round_stone[1]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-26">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][2]" value="{{$design->total_stone_count->round_stone[2]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-28">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][3]" value="{{$design->total_stone_count->round_stone[3]}}">
                                </td>
                                <td class="text-right" id="total-big-stones-210">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][4]" value="{{$design->total_stone_count->round_stone[4]}}">
                                </td>
                            </tr>
                            <tr>
                                <td>TB STONES</td>
                                <td class="text-right" id="total-tb-stones-22">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][0]" value="{{$design->total_stone_count->round_stone[0]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-24">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][1]" value="{{$design->total_stone_count->round_stone[1]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-26">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][2]" value="{{$design->total_stone_count->round_stone[2]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-28">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][3]" value="{{$design->total_stone_count->round_stone[3]}}">
                                </td>
                                <td class="text-right" id="total-tb-stones-210">
                                    <input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][4]" value="{{$design->total_stone_count->round_stone[4]}}">
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



    @if ($errors->any())
        <h1>Errors</h1>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var counter = {{$lastKey}};
            $("#rowAddButton").click(function () {
                var content = '<tr id="add_stone_row_'+counter+'"><td><input type="text" name="stones['+counter+'][size]" pattern="\\d+.\\d{2}" title="Example: 1.26, 1.80" required></td><td><select name="stones['+counter+'][type]" id=""><option value="BIG">BIG</option><option value="ROUND">ROUND</option></select></td><td><input type="text" name="stones['+counter+'][quantity][0]" required pattern="\\d+" title=""></td><td><input type="text" name="stones['+counter+'][quantity][1]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][quantity][2]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][quantity][3]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][quantity][4]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][price]" required pattern="\\d+.\\d{2}" title="Example: 500.00, 1000.70"></td><td><button type="button" data-id="'+counter+'" class="delete_row_btn btn btn-primary button button-small" title="Delete"><i class="fa fa-trash"></i></button></td></tr>';
                $("#append_parent").append(content);
                counter++;
            });
        });
    </script>

    <script type="text/javascript">
        // delete row
        $(document).ready(function() {
            var dataId  = 0; 
            $('body').on('click','.delete_row_btn',function(){
            // $('.delete_row_btn').click(function() {
                dataId = $(this).attr('data-id');
                console.log(dataId);
                $("#add_stone_row_"+dataId).remove();
            });
        });
    </script>
@endsection
