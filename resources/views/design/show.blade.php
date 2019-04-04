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
    <h2 class="text-center py-3">Design No: #{{$design->design_no}}</h2>
    <form action="{{route('design.store-design')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <table class="table table-bordered" id="">
                            <tbody>
                            <tr>
                                <td class="ts">Design Number:</td>
                                <td>{{$design->design_no}}</td>
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
                        <div class="preview img-wrapper rounded" style="background-image: url({{asset($design->picture)}});background-size: cover; background-position:center"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row text-left">
                                <label class="col-form-label ml-0"><b>Rhodium</b></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-control form-control-primary" id="calcPrice4Pcs" style="height: 36px;">
                                    <span>{{$design->rhodium}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row text-left">
                                <label class="col-form-label ml-0"><b>Misc. price</b></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-control form-control-primary" id="calcPrice4Pcs" style="height: 36px;">
                                    <span>{{$design->misc_price}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row text-left">
                                <label class="col-form-label ml-0"><b>Markup %</b></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-control form-control-primary" id="calcPrice4Pcs" style="height: 36px;">
                                    <span>{{$design->markup_percentage}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row text-left">
                                <label class="col-form-label ml-0"><b>Price(4 pcs)</b></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-control form-control-primary" id="calcPrice4Pcs" style="height: 36px;">
                                    <span>{{$design->price_4pcs}}</span>
                                </div>
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
                                @if($stonesCount > 0)
                                    @foreach($design->stones as $stone)
                                        <tr>
                                            <td>{{$stone->size}}</td>
                                            <td>
                                                {{$stone->stone_type}}
                                            </td>
                                            <td>
                                                {{$stone->stone_color}}
                                            </td>
                                            <td>{{$stone->quantity[0]}}</td>
                                            <td>{{$stone->quantity[1]}}</td>
                                            <td>{{$stone->quantity[2]}}</td>
                                            <td>{{$stone->quantity[3]}}</td>
                                            <td>{{$stone->quantity[4]}}</td>
                                            <td>{{$stone->stone_price}}</td>
                                            <td>{{$stone->labour_charge}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
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
                                            {{$design->total_stone_count->round_stone[0]}}
                                        </td>
                                        <td class="text-right" id="total-round-stones-24">
                                            {{$design->total_stone_count->round_stone[1]}}
                                        </td>
                                        <td class="text-right" id="total-round-stones-26">
                                            {{$design->total_stone_count->round_stone[2]}}
                                        </td>
                                        <td class="text-right" id="total-round-stones-28">
                                            {{$design->total_stone_count->round_stone[3]}}
                                        </td>
                                        <td class="text-right" id="total-round-stones-210">
                                            {{$design->total_stone_count->round_stone[4]}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BIG STONES</td>
                                        <td class="text-right" id="total-big-stones-22">
                                            {{$design->total_stone_count->big_stone[0]}}
                                        </td>
                                        <td class="text-right" id="total-big-stones-24">
                                            {{$design->total_stone_count->big_stone[1]}}
                                        </td>
                                        <td class="text-right" id="total-big-stones-26">
                                            {{$design->total_stone_count->big_stone[2]}}
                                        </td>
                                        <td class="text-right" id="total-big-stones-28">
                                            {{$design->total_stone_count->big_stone[3]}}
                                        </td>
                                        <td class="text-right" id="total-big-stones-210">
                                            {{$design->total_stone_count->big_stone[4]}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TB STONES</td>
                                        <td class="text-right" id="total-tb-stones-22">
                                            {{$design->total_stone_count->tb_stone[0]}}
                                        </td>
                                        <td class="text-right" id="total-tb-stones-24">
                                            {{$design->total_stone_count->tb_stone[1]}}
                                        </td>
                                        <td class="text-right" id="total-tb-stones-26">
                                            {{$design->total_stone_count->tb_stone[2]}}
                                        </td>
                                        <td class="text-right" id="total-tb-stones-28">
                                            {{$design->total_stone_count->tb_stone[3]}}
                                        </td>
                                        <td class="text-right" id="total-tb-stones-210">
                                            {{$design->total_stone_count->tb_stone[4]}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <a href="{{route('design.edit', ['design' => $design->design_no])}}" class="btn btn-primary pull-right add-row">
                                <i class="fa fa-pencil"></i>&nbsp;&nbsp; Edit
                            </a>
                        </div>
                    </div>
                </div>
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
    <script>
        $(document).ready(function () {
            var counter = 1;
            $("#rowAddButton").click(function () {
                var content = '<tr><td><input type="text" name="stones[' + counter +
                    '][size]"></td><td><input type="text" name="stones['+ counter +'][type]"></td> <td><input type="text" name="stones['+ counter +'][quantity][0]"></td><td><input type="text" name="stones['+ counter +'][quantity][1]"></td><td><input type="text" name="stones['+ counter +'][quantity][2]"></td><td><input type="text" name="stones['+ counter +'][quantity][3]"></td><td><input type="text" name="stones['+ counter +'][quantity][4]"></td><td><input type="text" name="stones['+ counter +'][price]"></td><td><a class="button button-small edit" title="Delete"><i class="fa fa-trash"></i></a></td></tr>';
                $("#append_parent").append(content);
                counter++;
            });
        });
    </script>
@endsection
