@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-ui css-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <h2 class="text-center py-3">Receive Order</h2>
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="">
                <div class="card">
                    <div class="card-header w-100">
                        {{--<h4>Order Allocation</h4>--}}

                    </div>
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
                <div class="row text-center" style="border: 1px solid #aba2d6;background-color: #eaffab;"><h6 class="mx-auto pt-3 ts">Receive No. Bangle Size(In Pcs.)</h6></div><div class="row"><div class="table-responsive"><table class="table table-bordered" id="editableTable"><thead><tr><th>Design No</th><th>2.2</th><th>2.4</th><th>2.6</th><th>2.8</th><th>2.10</th><th>Allocation Date</th><th>Round</th><th>Big</th></tr></thead><tbody id="dumpcontent_1">

                            </tbody></table></div></div>
            </div>
        <div class="row">
            <div class="col-sm-12" id="allocateBtn">
                <div class="my-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right add-row" id="submit_btn">
                            <i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit
                        </button>
                    </div>
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
            $("#allocateBtnTableOpen").hide();
            $('#orderNo').on('change', function() {
                var content = '';

                $.ajax({success: function(){

                    content += '<tr><td>223</td><td>23</td><td>34</td><td>38</td><td>123</td><td>65</td><td>DD/MM/YYYY</td><td>100</td><td>100</td><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total </td><td>Total</td></tr><tr><td colspan="5">Wages Calculation / Payment Calculation :</td><td colspan="5">Calculation</td></tr><tr><td colspan="1"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[0]" required="" pattern="" title="" value="" placeholder="2.2"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[1]" required="" pattern="" title="" value="" placeholder="2.4"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[2]" required="" pattern="" title="" value="" placeholder="2.6"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[3]" required="" pattern="" title="" value="" placeholder="2.8"></td><td><input class="form-control form-control-primary" type="text" name="order[0].quantity[4]" required="" pattern="" title="" value="2.10"></td><td><input class="form-control form-control-primary" type="text" name="order[0].[date]" required="" pattern="" title="" value="" placeholder="DD/MM/YYYY"></td><td colspan="1"></td><td colspan="1"></td></tr>';

//                    console.log('Content = '+ content);
                    $("#dumpcontent_1").html(content);
                    $("#allocationtable").show();
                    $("#allocateBtn").show();
                    $('#submit_btn').click(function () {
                        $("#allocateBtnTableOpen").show();
                    });
                }});
            });
        });
    </script>

@endsection