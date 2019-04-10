@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-ui css-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style type="text/css">
        .table td, .table th{
            padding: 0.25rem !important;
        }
        .max-length-error{
            color: red;
            display: block;
        }
    </style>
@endsection

@section('content')
<form action="{{route('order.storeallocation', ['order' => $order->order_no])}}" method="post">
    @csrf
    <h2 class="text-center py-3">Order Allocation</h2>
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="">
                <div class="card">
                    <div class="card-block w-100">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order No.</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">
                                    <span>{{$order->order_no}}</span>
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                </div>
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Party Name</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">
                                    <span>{{$order->party_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Delivery Date</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">
                                    <span>{{$order->delivery_date}}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" style="width: 170px;" class="btn btn-success pull-right add-row">
                                    <i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit
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
                                @foreach($allocations as $allocation)
                                <li>
                                	<div class="card list-view-media">
                                        <div class="card-block w-100">
                                            <div class="media">
                                                <div class="media-body">
                                                    <table class="table table-bordered" id="editableTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Design no. #{{$allocation[0]->design_no}}</th>
                                                                <th>2.2</th>
                                                                <th>2.4</th>
                                                                <th>2.6</th>
                                                                <th>2.8</th>
                                                                <th>2.10</th>
                                                                <th colspan="3"></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Allocate to</th>
                                                                <th class="leftCountCalc" data-design-no="{{$allocation[0]->design_no}}" data-bangle-size="2.2" data-max-set-limit="{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][0]}}">
                                                                    {{$maxSetCount[$allocation[0]->design_no]['max_set_count'][0]}}
                                                                    <span class="max-length-error"><b>Maximum allocation limit exceeded!</b></span>
                                                                </th>
                                                                <th class="leftCountCalc" data-design-no="{{$allocation[0]->design_no}}" data-bangle-size="2.4" data-max-set-limit="{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][1]}}">{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][1]}}<span class="max-length-error"><b>Maximum allocation limit exceeded!</b></span>
                                                                </th>
                                                                <th class="leftCountCalc" data-design-no="{{$allocation[0]->design_no}}" data-bangle-size="2.6" data-max-set-limit="{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][2]}}">{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][2]}}<span class="max-length-error"><b>Maximum allocation limit exceeded!</b></span>
                                                                </th>
                                                                <th class="leftCountCalc" data-design-no="{{$allocation[0]->design_no}}" data-bangle-size="2.8" data-max-set-limit="{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][3]}}">{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][3]}}<span class="max-length-error"><b>Maximum allocation limit exceeded!</b></span>
                                                                </th>
                                                                <th class="leftCountCalc" data-design-no="{{$allocation[0]->design_no}}" data-bangle-size="2.10" data-max-set-limit="{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][4]}}">{{$maxSetCount[$allocation[0]->design_no]['max_set_count'][4]}}<span class="max-length-error"><b>Maximum allocation limit exceeded!</b></span>
                                                                </th>
                                                                <th>Round Stones</th>
                                                                <th>Big Stones</th>
                                                                <th>TB Stone</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-total-rows="1">
                                                        	<?php 
                                                        	$counterAlloc = 1;
                                                        	$maxLength22 = 0;
                                                        	?>

                                                            @foreach(json_decode($allocation[0]->allocations) as $alloc)
                                                            <tr data-row-index="{{$counterAlloc}}" data-design-no="{{$allocation[0]->design_no}}">
                                                                <td>
                                                                    <select class="form-control form-control-primary" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][worker]" readonly autocomplete="off">
                                                                        @foreach($workers as $worker)
                                                                        <option value="{{$worker->id}}" @if($worker->id == $alloc->worker) selected @endif>{{$worker->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][allocation][0]" data-design-no="{{$allocation[0]->design_no}}" data-bangle-size="2.2" data-max-length="7" value="{{$alloc->allocation[0]}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][allocation][1]" data-design-no="{{$allocation[0]->design_no}}" data-max-length="8" data-bangle-size="2.4" required="" value="{{$alloc->allocation[1]}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][allocation][2]" data-design-no="{{$allocation[0]->design_no}}" data-max-length="9" data-bangle-size="2.6" required="" value="{{$alloc->allocation[2]}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][allocation][3]" data-design-no="{{$allocation[0]->design_no}}" data-max-length="1" data-bangle-size="2.8" required="" value="{{$alloc->allocation[3]}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][allocation][4]" data-design-no="{{$allocation[0]->design_no}}" data-max-length="1" data-bangle-size="2.10" required="" value="{{$alloc->allocation[4]}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][round_stone]" data-stone-type="round_stone" required="" value="{{$alloc->round_stone}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][big_stone]" data-stone-type="big_stone" required="" value="{{$alloc->big_stone}}" autocomplete="off" >
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required" name="allocation[{{$allocation[0]->design_no}}][{{$counterAlloc}}][tb_stone]" data-stone-type="tb_stone" required="" value="{{$alloc->tb_stone}}" autocomplete="off" >
                                                                </td>
                                                            </tr>
                                                            <?php $counterAlloc++ ?>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <button type="button" class="btn btn-primary pull-right add-row allocateMoreBtn" style="margin-top: 10px" data-design-no="423">
                                                        <i class="fa fa-plus"></i>&nbsp;&nbsp; Allocate more
                                                    </button>
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
</form>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".max-length-error").each(function() {
                $(this).hide();
            });
            $("body").on("keyup", ".input-field-allocate-count", function() {
                var inputField = $(this);
                updateStonesCount(inputField);
                var thisRow = $(this).closest("tr");
                var thisRowDesignNumber = $(this).closest("tr").attr("data-design-no");
                if(checkARowHasAtLeastOneBangleSize(thisRow) == 1) {
                    calcStonesCount(thisRow, thisRowDesignNumber);
                }
            });
        });
        function updateStonesCount(inputField)
        {
            if(inputField.val() == '') {
                inputField.addClass("border-danger");
            } else {
                inputField.removeClass("border-danger");
            }
            
            var inputBangleSize = inputField.attr("data-bangle-size");

            validateMaxLengthWithTotal(inputField, inputBangleSize);
        }
        function validateMaxLengthWithTotal(inputField, bangleSize)
        {
            var total = 0;
            var maxLength = inputField.closest("table").find('th.leftCountCalc[data-bangle-size="'+bangleSize+'"]').attr("data-max-set-limit");
            inputField.closest("tbody").find('input[data-bangle-size="'+bangleSize+'"]').each(function() {
                total += parseInt($(this).val());
            });
            if(total > maxLength) {
                inputField.closest("table").find('th.leftCountCalc[data-bangle-size="'+bangleSize+'"]').find("span").show();
            } else {
                inputField.closest("table").find('th.leftCountCalc[data-bangle-size="'+bangleSize+'"]').find("span").hide();
            }
        }

        function checkARowHasAtLeastOneBangleSize(row)
        {
            var status = 0;
            for (var i = 2; i <= 10; i = i+2) {
                var value = row.find('input[data-bangle-size="2.'+i+'"]').val();
                if(value >= 1) {
                    status = 1;
                    break;
                }
            }
            return status;
        }
    </script>

    <script type="text/javascript">
        function calcStonesCount(row, designNumber)
        {
            row.addClass("border-success");
            var leftCount = [];
            for (var i = 2; i <= 10; i = i+2) {
                var bs = '2.'+i;

                var valueOfLastRow = row.find('input[data-bangle-size="'+bs+'"]').val();

                if(valueOfLastRow == '') {
                    valueOfLastRow = 0;                    
                }
                leftCount.push(valueOfLastRow);
            }
            
            leftCount = JSON.stringify(leftCount);

            $.ajax({
                url: '{{env('ROOT_URL')}}/api/stones/alocation-stonecount',
                type: "POST",
                data : {leftCount: leftCount, designNumber: designNumber},
                error: function () {
                },
                success: function (data) {
                    row.find('input[data-stone-type="round_stone"]').val(data.data.round_stone);
                    row.find('input[data-stone-type="big_stone"]').val(data.data.big_stone);
                    row.find('input[data-stone-type="tb_stone"]').val(data.data.tb_stone);
                }
            });
        }
    </script>
@endsection