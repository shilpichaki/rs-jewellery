@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
<!--forms-wizard css-->
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.steps.css')}}">
<!--jquery-ui css-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .addDesign {
        display: none;
    }

    html {
        scroll-behavior: smooth;
    }

    .attBox {
        width: 100%;
        position: relative;
        margin-top: 25px;
    }

    .attachDesign {
        overflow-x: hidden;
        width: 100%;
        display: block;

        /* hide scrollbar for mozila*/
        overflow-y: scroll;
        /*scrollbar-color:  red blue;*/
        scrollbar-width: none;
        /*position: relative;*/
    }

    .attachDesign::-webkit-scrollbar {
        display: none;
    }

    .attachDesignCon {
        min-width: 100%;
    }

    .designScroller {
        position: absolute;
        height: 100%;
        width: 40px;
        top: 0;
        z-index: 10;
        cursor: pointer;
        display: none;
    }

    .scrollRight {
        right: 0;
        background: linear-gradient(to left, rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
    }

    .scrollLeft {
        left: 0;
        background: linear-gradient(to right, rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
    }

    .mycards {
        height: 140px;
        width: 200px;
        background-position: center;
        background-size: cover;
        float: left;
        display: inline-block;
        margin: 10px;

        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        cursor: pointer;
    }

    .card-list-img {
        height: 100px;
        width: 100px;
        border-radius: 10px;
        background-size: cover;
        background-position: center;
    }

    .card-block {
        padding: .75 !important;
    }

    .table td,
    .table th {
        padding: 0.25rem !important;
        text-align: center;
    }
    .form-control.form-control-primary{
        min-height: 35.5px;
    }

    .remove-design-btn{
        position: absolute;
        right: 0px;
        z-index: 1;
        top: 0;
        display: none;
    }

    .list-view li{
        position: relative;
    }
</style>
@endsection
@section('content')
<form action="{{route('order.update', ['order' => $order->order_no])}}" method="post">
    @csrf
    @method('put')
<div class="main-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header w-100 text-center">
                        <h4>Order # {{$order->order_no}}</h4>
                    </div>
                    <div class="card-block w-100">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order No.</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control autonumber form-control-primary" name="order_no" value="{{$order->order_no}}" disabled="">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Party name</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control autonumber form-control-primary" name="party_name" value="{{$order->party_name}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Issue Date</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control autonumber form-control-primary" name="issue_date" value="{{$order->issue_date}}">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Delivery Date</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control autonumber form-control-primary" name="delivery_date" value="{{$order->delivery_date}}">
                            </div>
                            <div class="col-sm-12">
                                <button style="width: 195px;" class="btn btn-success pull-right add-row">
                                    <i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Update order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="row card-block">
                        <div class="col-md-12">
                            <ul class="list-view">
                                @foreach($order->designs as $designNumber => $design)
                                <input type="hidden" name="designs[{{$design->design_no}}][design_no]" value="{{$design->design_no}}">
                                <li>
                                    <button type="button" class="close remove-design-btn">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <div class="card list-view-media">
                                        <div class="card-block w-100">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <div class="card-list-img"
                                                        style="background-image: url({{asset($masterDesigns[$designNumber][0]->picture)}})">
                                                    </div>
                                                </a>
                                                <div class="media-body">
                                                    <div class="col-xs-12">
                                                        <h2 class="d-inline-block">#{{$design->design_no}}</h2>
                                                    </div>
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
                                                                <th class="text-left" id="total_stone_count"
                                                                    data-totalstonecount="">Stone count</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $totalRows = 0; ?>
                                                            @foreach($design->stone_count as $scKey => $stoneCount)
                                                            <tr>
                                                                <td>{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->size}}</td>
                                                                <td>{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->stone_type}}
                                                                </td>
                                                                <td>{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->stone_color}}</td>
                                                                <td data-stone-row="{{$totalRows}}"
                                                                     data-design-no="{{$design->design_no}}" 
                                                                     data-bangle-size="2.2"
                                                                     data-value="{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[0]}}">
                                                                     {{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[0]}}
                                                                 </td>
                                                                    <td data-stone-row="{{$totalRows}}"
                                                                     data-design-no="{{$design->design_no}}" 
                                                                     data-bangle-size="2.4"
                                                                     data-value="{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[1]}}">
                                                                     {{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[1]}}
                                                                 </td>
                                                                    <td data-stone-row="{{$totalRows}}"
                                                                     data-design-no="{{$design->design_no}}" 
                                                                     data-bangle-size="2.6"
                                                                     data-value="{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[2]}}">
                                                                     {{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[2]}}
                                                                 </td>
                                                                    <td data-stone-row="{{$totalRows}}"
                                                                     data-design-no="{{$design->design_no}}" 
                                                                     data-bangle-size="2.8"
                                                                     data-value="{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[3]}}">
                                                                     {{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[3]}}
                                                                 </td>
                                                                    <td data-stone-row="{{$totalRows}}"
                                                                     data-design-no="{{$design->design_no}}" 
                                                                     data-bangle-size="2.10"
                                                                     data-value="{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[4]}}">
                                                                     {{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[4]}}
                                                                 </td>
                                                                <td>
                                                                    <input 
                                                                    type="hidden" 
                                                                    name="designs[{{$design->design_no}}][stone_count][{{$scKey}}]" 
                                                                    class="form-control form-control-primary" 
                                                                    data-design-number="{{$design->design_no}}" 
                                                                    data-row="{{$totalRows}}"
                                                                    value="{{$stoneCount}}">
                                                                    <div class="text-left form-control form-control-primary" 
                                                                    data-design-number="{{$design->design_no}}" 
                                                                    data-row="{{$totalRows}}">
                                                                        <span>{{$stoneCount}}</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php $totalRows++; ?>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Set.</td>
                                                                <?php $columnOqs = 2; ?>
                                                                <?php $columnOqs1 = 0; ?>
                                                                @foreach($design->oc as $orderCount)
                                                                <td>
                                                                    <input 
                                                                    class="form-control form-control-primary input_oqs input-required oqs2{{$columnOqs}}" data-bangle-size="2.{{$columnOqs}}" 
                                                                    data-design-no="{{$design->design_no}}"
                                                                    type="text" 
                                                                    required="" 
                                                                    name="designs[{{$design->design_no}}][oc][{{$columnOqs1}}][oqs]"
                                                                    value="{{$orderCount->oqs}}">
                                                                </td>
                                                                <?php $columnOqs += 2; ?>
                                                                <?php $columnOqs1++; ?>
                                                                @endforeach
                                                                <td rowspan="2">
                                                                    <button style="width: 100%;" type="button" class="btn btn-success calc_st_cnt"  data-total-rows="{{$totalRows}}" data-design-no={{$design->design_no}} >Calculate Stone Count</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Pcs.</td>
                                                                <?php $columnOqp = 2; ?>
                                                                <?php $columnOqp1 = 0; ?>
                                                                @foreach($design->oc as $orderCount)
                                                                <td>
                                                                    <input 
                                                                    class="form-control form-control-primary input_oqp oqp2{{$columnOqp}}" 
                                                                    data-design-no="{{$design->design_no}}" 
                                                                    data-bangle-size="2.{{$columnOqp}}" 
                                                                    type="hidden"
                                                                    name="designs[{{$design->design_no}}][oc][{{$columnOqp1}}][oqp]"
                                                                    value="{{$orderCount->oqp}}">
                                                                    
                                                                    <div class="form-control form-control-primary input_oqp oqp2{{$columnOqp}}" 
                                                                    data-design-no="{{$design->design_no}}" 
                                                                    data-bangle-size="2.{{$columnOqp}}" 
                                                                    name="designs[{{$design->design_no}}][oc][{{$columnOqp1}}][oqp]">
                                                                        <span>{{$orderCount->oqp}}</span>
                                                                    </div>
                                                                </td>
                                                                <?php $columnOqp += 2; ?>
                                                                <?php $columnOqp1++; ?>
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Rhodium</td>
                                                                <td>
                                                                    <input type="text" name="designs[{{$design->design_no}}][rhodium][1]" class="form-control form-control-primary" value="<?php echo ((array) $design->rhodium)[1]; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="designs[{{$design->design_no}}][rhodium][2]" class="form-control form-control-primary" value="<?php echo ((array) $design->rhodium)[2]; ?>">
                                                                </td>
                                                                <td colspan="2">
                                                                    <input type="text" name="designs[{{$design->design_no}}][rhodium][3]" class="form-control form-control-primary" value="<?php echo ((array) $design->rhodium)[3]; ?>">
                                                                </td>
                                                                <td colspan="5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- List view card end -->
            </div>
        </div>
    </div>
</div>    
</form>

@endsection

@section('js')
<script type="text/javascript">
    var scrollerPosition = 0;
    var firstScrollerWidth = Math.round($(".attachDesign").width());
    var designCount = {{$totalDesign}};
    var totalRequiredWidth = designCount * 220;
    var designContainerWidth = $(".attachDesignCon").width();

    if (totalRequiredWidth > designContainerWidth) {
        $(".designScroller").show();
        $(document).ready(function () {
            $(".attachDesignCon").css("min-width", 5000);
        });
    }

    // on scroll left
    $(".scrollRight").click(function () {
        if ((scrollerPosition + 220) < firstScrollerWidth) {
            scrollerPosition += 220
            $('.attachDesign').animate({
                scrollLeft: scrollerPosition
            }, 300);
        }
    });
    $(".scrollLeft").click(function () {
        if (scrollerPosition >= 220) {
            scrollerPosition -= 220
            $('.attachDesign').animate({
                scrollLeft: scrollerPosition
            }, 300);
        }
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".calc_st_cnt").click(function () {
            var totalRows = $(this).attr("data-total-rows");
            var designNumber = $(this).attr("data-design-no");

            var show = checkIfEverythingFilledUp();

            calculateStoneCount(totalRows, designNumber);
        });
    });
    function calculateStoneCount(totalRows, designNumber)
    {
        // console.log(totalRows);
        for (var i = 0 ; i < totalRows; i++) {
            var total = 0;
            for (var j = 2; j <= 10; j=j+2) {
                // $('td[data-design-no="'+designNumber+'"][data-stone-row="'+i+'"][data-bangle-size="2.'+j+'"]').css("background-color", 'red');
                var value = $('td[data-design-no="'+designNumber+'"][data-stone-row="'+i+'"][data-bangle-size="2.'+j+'"]').attr("data-value");
                value = value.trim();

                var multiplyBy = $(".oqp2"+j+'[data-design-no="'+designNumber+'"]').val();
                // multiplyBy = multiplyBy.trim();
                
                value *= multiplyBy;

                total += value;
            }

            $('div[data-design-number="'+designNumber+'"][data-row="'+i+'"]').find("span").html(total);
            $('input[data-design-number="'+designNumber+'"][data-row="'+i+'"]').val(total);
            console.log(total);
        }
    }
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

    // on change order quantity set
    $("body").on('keyup', '.input_oqs', function() {
        var bangleSize = $(this).attr('data-bangle-size');
        var designNumber = $(this).attr('data-design-no');
        var value = $(this).val();

        if(value != '') {
            var quantity = parseInt(value);
            $('.input_oqp[data-design-no="'+designNumber+'"][data-bangle-size="'+bangleSize+'"]').find("span").html((quantity*4));
            $('.input_oqp[data-design-no="'+designNumber+'"][data-bangle-size="'+bangleSize+'"]').val((quantity*4));
        }
    });

    // // on deleteing design
    // $("body").on("click", ".remove-design-btn", function() {
    //     $(this).closest("li").remove();
    // });
</script>
@endsection
