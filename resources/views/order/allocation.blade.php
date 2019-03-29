@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-ui css-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <h2 class="text-center py-3">Order Allocation</h2>
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="">
                <div class="card">
                    {{--<div class="card-header w-100">--}}
                        {{--<h4>Order Allocation</h4>--}}

                    {{--</div>--}}
                    <div class="card-block w-100">
                        <form action="" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Order No.</label>
                                </div>
                                <div class="col-sm-4">

                                    <select class="form-control autonumber form-control-primary" value="" required="" id="orderNo" name="">
                                        <option value="">Select One</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>

                                    <span class="form-bar"></span>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Party Name</label>
                                </div>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control autonumber form-control-primary" value="" required="" id="" name="">
                                    <span class="form-bar"></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Delivery Date</label>
                                </div>
                                <div class="col-sm-4">

                                    <input type="date" class="form-control autonumber form-control-primary hasDatepicker" value="" required="" id="datepicker" name="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Worker Name</label>
                                </div>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control autonumber form-control-primary hasDatepicker" value="" required="" id="" name="">
                                    <span class="form-bar"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="allocationtable">
                <div class="row text-center" style="border: 1px solid #aba2d6;background-color: #eaffab;">
                        <h6 class="mx-auto pt-3 ts">Allocation Table</h6>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="editableTable">
                            <thead>
                            <tr>
                                <th>Design No</th>
                                <th>2.2</th>
                                <th>2.4</th>
                                <th>2.6</th>
                                <th>2.8</th>
                                <th>2.10</th>
                                <th>Allocation Date</th>
                                <th>Round</th>
                                <th>Big</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="dumpcontent">
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="223">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="23">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="34">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="38">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="123">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="65">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="">--}}
                                {{--</td>--}}
                                {{--<td><input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="DD/MM/YYYY"></td>--}}
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="Total">
                                </td>
                                <td>
                                    <input class="form-control form-control-primary" type="text" name="" required="" pattern="" title="" value="" placeholder="Total">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    {{----}}
                {{--<div class="row form-group">--}}
                    {{--<div class="col-md-12 my-3 addDesignDiv">--}}
                        {{--<button type="button" class="btn btn-primary pull-right add-row btnAddDesign">--}}
                            {{--<i class="fa fa-plus"></i>&nbsp;&nbsp; Allocate--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}



            <div class="row form-group py-2" style="background-color: #eaffab;">
                <div class="col-sm-6">
                    <label class="col-form-label">Wages Calculation / Payment Calculation :</label>
                </div>
                <div class="col-sm-6">

                    <input type="text" class="form-control autonumber form-control-primary hasDatepicker" value="" required="" id="" name="">
                    <span class="form-bar"></span>
                </div>
            </div>

            </div>

            <div class="col-sm-12" id="allocateBtn">
                <div class="my-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right add-row" id="submit_btn">
                            <i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Allocate
                        </button>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <script>
        $(document).ready(function(){
            $("#allocateBtn").hide();
            $("#allocationtable").hide();
            $('#orderNo').on('change', function() {
                var content = '';

                $.ajax({success: function(){

                    content += '<td><input class="form-control form-control-primary" type="text" name="order[0][design]" required="" pattern="" title="" value="" placeholder="223"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[0]" required="" pattern="" title="" value="" placeholder="23"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[1]" required="" pattern="" title="" value="" placeholder="34"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[2]" required="" pattern="" title="" value="" placeholder="38"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[3]" required="" pattern="" title="" value="" placeholder="123"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[4]" required="" pattern="" title="" value="65"></td><td><input class="form-control form-control-primary" type="text" name="order[0].[date]" required="" pattern="" title="" value="" placeholder="DD/MM/YYYY"></td><td><input class="form-control form-control-primary" type="text" name="order[0].[round]" required="" pattern="" title="" value=""></td><td><input class="form-control form-control-primary" type="text" name="order[0].[big]" required="" pattern="" title="" value=""></td>';

//                    console.log('Content = '+ content);
                    $("#dumpcontent").html(content);
                    $("#allocationtable").show();
                    $("#allocateBtn").show();
                }});
            });
        });
    </script>

@endsection