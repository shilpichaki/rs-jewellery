@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-ui css-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style type="text/css">
        .table td, .table th{
            padding: 0.25rem !important;
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
                                @foreach($order->designs as $design)
                                <li>
                                    <div class="card list-view-media">
                                        <div class="card-block w-100">
                                            <div class="media">
                                                <div class="media-body">
                                                    <table class="table table-bordered" id="editableTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Design no. #{{$design->design_no}}</th>
                                                                <th>2.2</th>
                                                                <th>2.4</th>
                                                                <th>2.6</th>
                                                                <th>2.8</th>
                                                                <th>2.10</th>
                                                                <th colspan="3"></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Allocate to</th>
                                                                <th class="leftCountCalc" data-design-no="{{$design->design_no}}" data-bangle-size="2.2" data-alloc-left="{{$design->oc[0]->oqs}}">{{$design->oc[0]->oqs}}</th>
                                                                <th class="leftCountCalc" data-design-no="{{$design->design_no}}" data-bangle-size="2.4" data-alloc-left="{{$design->oc[1]->oqs}}">{{$design->oc[1]->oqs}}</th>
                                                                <th class="leftCountCalc" data-design-no="{{$design->design_no}}" data-bangle-size="2.6" data-alloc-left="{{$design->oc[2]->oqs}}">{{$design->oc[2]->oqs}}</th>
                                                                <th class="leftCountCalc" data-design-no="{{$design->design_no}}" data-bangle-size="2.8" data-alloc-left="{{$design->oc[3]->oqs}}">{{$design->oc[3]->oqs}}</th>
                                                                <th class="leftCountCalc" data-design-no="{{$design->design_no}}" data-bangle-size="2.10" data-alloc-left="{{$design->oc[4]->oqs}}">{{$design->oc[4]->oqs}}</th>
                                                                <th>Round Stones</th>
                                                                <th>Big Stones</th>
                                                                <th>TB Stone</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-total-rows="1">
                                                            <tr data-row-index="1" data-design-no="{{$design->design_no}}">
                                                                <td class="worker">
                                                                    <select class="form-control form-control-primary"
                                                                    name="allocation[{{$design->design_no}}][1][worker]">
                                                                        <option value="1">Ram</option>
                                                                        <option value="2">Sam</option>
                                                                        <option value="3">Amit</option>
                                                                    </select>
                                                                </td>
                                                                <td class="allocate-count">
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$design->design_no}}][1][allocation][0]" data-design-no="{{$design->design_no}}" data-bangle-size="2.2" data-max-length="{{$design->oc[0]->oqs}}" placeholder="Max: {{$design->oc[0]->oqs}}" required>
                                                                </td>
                                                                <td class="allocate-count">
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$design->design_no}}][1][allocation][1]" data-design-no="{{$design->design_no}}" data-max-length="{{$design->oc[1]->oqs}}" data-bangle-size="2.4" placeholder="Max: {{$design->oc[1]->oqs}}" required>
                                                                </td>
                                                                <td class="allocate-count">
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$design->design_no}}][1][allocation][2]" data-design-no="{{$design->design_no}}" data-max-length="{{$design->oc[2]->oqs}}" data-bangle-size="2.6" placeholder="Max: {{$design->oc[2]->oqs}}" required>
                                                                </td>
                                                                <td class="allocate-count">
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$design->design_no}}][1][allocation][3]" data-design-no="{{$design->design_no}}" data-max-length="{{$design->oc[3]->oqs}}" data-bangle-size="2.8" placeholder="Max: {{$design->oc[3]->oqs}}" required>
                                                                </td>
                                                                <td class="allocate-count">
                                                                    <input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation[{{$design->design_no}}][1][allocation][4]" data-design-no="{{$design->design_no}}" data-max-length="{{$design->oc[4]->oqs}}" data-bangle-size="2.10" placeholder="Max: {{$design->oc[4]->oqs}}" required>
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required" name="allocation[{{$design->design_no}}][1][round_stone]" data-stone-type="round_stone" required readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required" name="allocation[{{$design->design_no}}][1][big_stone]" data-stone-type="big_stone" required readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="" class="form-control form-control-primary input-required" name="allocation[{{$design->design_no}}][1][tb_stone]" data-stone-type="tb_stone" required readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-primary pull-right add-row allocateMoreBtn" 
                                                        style="margin-top: 10px"
                                                        data-design-no="{{$design->design_no}}" disabled>
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

            $(".allocateMoreBtn").click(function() {
                $(this).prop("disabled", true);
                var designNo = $(this).attr("data-design-no");
                var prevTotalRows = $(this).closest(".media-body").find("tbody").attr("data-total-rows");
                prevTotalRows = parseInt(prevTotalRows);
                var currentTotalRows = prevTotalRows + 1;

                var selectedWorker = new Object();
                selectedWorker.id = $(this).closest(".media-body").find("tbody").children("tr").last().children("td").first().find("select").val();
                selectedWorker.name = $(this).closest(".media-body").find("tbody").children("tr").last().children("td").first().find("select option:selected").text();
                
                workerList = removeSelectedWorker($(this), selectedWorker);
                var content = '';
                if(workerList != ''){
                    $.each(workerList, function(key, worker){
                        content += '<option value="'+worker.id+'">'+worker.name+'</option>';
                    });
                }else{
                    content += '<option value="">Empty</option>';
                }

                makeEveryFieldReadOnly(prevTotalRows, designNo);

                
                
                $(this).closest(".media-body").find("tbody").attr("data-total-rows", currentTotalRows);

                var leftCounts = calculateMaxLengthNextFow(designNo, prevTotalRows);

                var newAllocationContent = '<tr data-row-index='+currentTotalRows+' data-design-no="'+designNo+'">';

                newAllocationContent    +=      '<td class="worker">';
                newAllocationContent    +=              '<select class="form-control form-control-primary" name="allocation['+designNo+']['+currentTotalRows+'][worker]">';
                newAllocationContent    +=                  content;
                newAllocationContent    +=              '<select/>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td class="allocate-count">';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation['+designNo+']['+currentTotalRows+'][allocation][0]" data-design-no="'+designNo+'" data-bangle-size="2.2" data-max-length="'+leftCounts[0]+'" placeholder="Max: '+leftCounts[0]+'" required>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td class="allocate-count">';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation['+designNo+']['+currentTotalRows+'][allocation][1]" data-design-no="'+designNo+'" data-bangle-size="2.4" data-max-length="'+leftCounts[1]+'" placeholder="Max: '+leftCounts[1]+'" required>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td class="allocate-count">';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation['+designNo+']['+currentTotalRows+'][allocation][2]" data-design-no="'+designNo+'" data-bangle-size="2.6" data-max-length="'+leftCounts[2]+'" placeholder="Max: '+leftCounts[2]+'" required>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td class="allocate-count">';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation['+designNo+']['+currentTotalRows+'][allocation][3]" data-design-no="'+designNo+'" data-bangle-size="2.8" data-max-length="'+leftCounts[3]+'" placeholder="Max: '+leftCounts[3]+'" required>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td class="allocate-count">';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required input-field-allocate-count" name="allocation['+designNo+']['+currentTotalRows+'][allocation][4]" data-design-no="'+designNo+'" data-bangle-size="2.10" data-max-length="'+leftCounts[4]+'" placeholder="Max: '+leftCounts[4]+'" required>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td>';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required" data-stone-type="round_stone" name="allocation['+designNo+']['+currentTotalRows+'][round_stone]" required readonly>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td>';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required" data-stone-type="big_stone" name="allocation['+designNo+']['+currentTotalRows+'][big_stone]" required readonly>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=      '<td>';
                newAllocationContent    +=          '<input type="" class="form-control form-control-primary input-required" data-stone-type="tb_stone" name="allocation['+designNo+']['+currentTotalRows+'][tb_stone]" required readonly>';
                newAllocationContent    +=      '</td>';
                newAllocationContent    +=  '</tr>'

                // canClickToAllocate()

                if(canAllocateMore(leftCounts) == 1){
                    $(this).closest(".media-body").find("tbody").append(newAllocationContent);
                } else {
                    $(this).prop('disabled', true);
                }
            });
        });

        function removeSelectedWorker(button, selectedWorker){
                
                var array = new Array();
                var workerListOptions = button.closest(".media-body").find("tbody").children("tr").last().children("td").first().find("select option");
                
                $.each(workerListOptions, function(key, option){
                    var values = new Object();
                    values.id = option.value;
                    values.name = option.innerHTML;
                    array.push(values);
                });
                var itemIndex = array.findIndex(function(item){
                    return item.id === selectedWorker.id;
                })

                if(itemIndex != -1){
                    array.splice(itemIndex, 1);
                }
                
                return array;
            }

        function makeEveryFieldReadOnly(row, designNumber)
        {
            $('tr[data-row-index="'+row+'"][data-design-no="'+designNumber+'"]').find("input").prop("readonly", true);
        }

        function calculateMaxLengthNextFow(designNumber, rowIndex)
        {
            var leftCount = [];
            for (var i = 2; i <= 10; i = i+2) {
                var bs = '2.'+i;

                var currentLeftCount = $('th.leftCountCalc[data-design-no="'+designNumber+'"][data-bangle-size="'+bs+'"]').attr("data-alloc-left");

                var valueOfLastRow = $('tr[data-row-index="'+rowIndex+'"]').find('input[data-design-no="'+designNumber+'"][data-bangle-size="'+bs+'"]').val();

                if(valueOfLastRow == '') {
                    $('tr[data-row-index="'+rowIndex+'"]').find('input[data-design-no="'+designNumber+'"][data-bangle-size="'+bs+'"]').val('0');
                    valueOfLastRow = 0;                    
                }

                var subtract = currentLeftCount - valueOfLastRow;

                $('th.leftCountCalc[data-design-no="'+designNumber+'"][data-bangle-size="'+bs+'"]').attr("data-alloc-left", subtract);

                leftCount.push(subtract);
            }
            return leftCount;
        }

        function canAllocateMore(leftCounts)
        {
            var canAllocateMore = 0;
            $.each(leftCounts, function (index, value) {
                if(value >= 1) {
                    canAllocateMore = 1;
                    return false;
                }
            });
            return canAllocateMore;
        }

        function inputValid(inputs){
            var inputsCount = inputs.length;
            var counter = 0;
            $.each(inputs, function(key, input){
                if(input.value == 0){
                    counter++;
                }
            });
            var valid = inputsCount == counter ? 0 : 1;
            return valid;
        }

        function allocationCheck(inputs){
            var allFieldCheck = 1;
            $.each(inputs, function(key, input){
                if(input.value == ''){
                    allFieldCheck = 0;
                    return false;
                }
            });
            return allFieldCheck;
        }
    </script>
    <script type="text/javascript">
        $("body").on("keyup", ".input-field-allocate-count", function() {
            var inputs = $(this).closest("tr").find('td[class="allocate-count"]').children("input");
            value = allocationCheck(inputs);
            valid = inputValid(inputs);
            var designNo = $(this).closest("tr").attr("data-design-no");
            var row = $(this).closest("tr");
            if(value == 1 && valid == 1){
                calcStonesCount(row, designNo);
                $(this).closest(".media-body").find("button").prop("disabled", false);
            }
            
            validateMaxValue($(this));
        });
        
        function validateMaxValue(element) {
            var maxLength = element.attr("data-max-length");
            var value = element.val();
            value = parseInt(value);

            if(isNaN(value)) {
                element.addClass("border-danger");
            } else {
                if(value > maxLength) {
                    element.addClass("border-danger");
                    setTimeout(function() {
                        element.val(maxLength);
                        element.removeClass("border-danger");
                    }, 10);
                } else {
                    element.removeClass("border-danger");
                }
            }
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
                    row.find('input[data-bangle-size="'+bs+'"]').val('0');
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
