@extends('layouts.master')

@section('css')
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.steps.css')}}">
@endsection

@section('content')
    <div class="row">

        <div class="offset-lg-2 col-lg-8">

            <div class="card">

                <div class="card-header">
                    <h4>Stock entry</h4>
                    <span>Application form for <code>Stock entry</code></span>

                </div>
                <div class="card-block">

                    <form action="{{route('stock.addstock')}}" method="post">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Material Type</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control form-control-primary"name="material_type" id="material_type">
                                    @foreach ($rawMaterial as $material)
                                        <option value="{{$material}}">{{$material}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Unit of Measurement</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="unit_of_measurement" id="unit_of_measurement" class="form-control form-control-primary" disabled="true">
                                    @foreach ($unitOfMeasurement as $unit)
                                        <option value="{{$unit}}">{{$unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Threshold value</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control autonumber form-control-primary" id="threshold_value" name="threshold_value" disabled="true">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Cuurent stock value of <span id="current_stock_name">WAX<span></label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control autonumber form-control-primary"
                                       id="current_stock_value" disabled="true">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Amount you want to add</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control autonumber form-control-primary"
                                       name="stock_value" id="stock_value" disabled="true">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Vendor</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control form-control-primary" name="vendor_id" id="vendor_id" disabled="true">
                                    @foreach ($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Today's rate</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" name="today_rate" id="today_rate" class="form-control autonumber form-control-primary" disabled="true">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="col-form-label">Price</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" name="price" id="price" class="form-control autonumber form-control-primary" disabled="true">
                            </div>
                        </div>

                        <button type="submit" id="submit_btn" class="btn btn-primary ml-auto" disabled="true">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

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
    <!--Forms - Wizard js-->
    <script src="{{asset('js/jquery.cookie.js')}}" type="506c7ecb9b519216be21f8d6-text/javascript"></script>
    <script src="{{asset('js/jquery.steps.js')}}" type="506c7ecb9b519216be21f8d6-text/javascript"></script>
    <script src="{{asset('js/jquery.validate.js')}}" type="506c7ecb9b519216be21f8d6-text/javascript"></script>
    <!-- Validation js -->
    <script src="{{asset('js/underscore-min.js')}}" type="506c7ecb9b519216be21f8d6-text/javascript"></script>
    <script src="{{asset('js/moment.min.js')}}" type="506c7ecb9b519216be21f8d6-text/javascript"></script>
    <script type="506c7ecb9b519216be21f8d6-text/javascript" src="{{asset('js/validate.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('js/form-wizard.js')}}" type="506c7ecb9b519216be21f8d6-text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#material_type").on('change click', function(){
                var rawMaterial = $(this).val();
                $.ajax({
                    url: '{{env('ROOT_URL')}}/api/stock/'+rawMaterial,
                    type: "GET",
                    error: function () {
                        console.log('Stock not found! Will add a new type of material in stock!');
                    },
                    success: function (data) {
                        // update values
                        $("#current_stock_name").html(data.data.raw_material_type);
                        $("#current_stock_value").val(data.data.stock_value);
                        $("#threshold_value").val(data.data.threshold_value);

                        // enable input fields
                        $("#threshold_value").prop('disabled', false);
                        $("#unit_of_measurement").prop('disabled', false);
                        $("#stock_value").prop('disabled', false);
                        $("#vendor_id").prop('disabled', false);
                        $("#today_rate").prop('disabled', false);
                        $("#price").prop('disabled', false);
                        $("#submit_btn").prop('disabled', false);                       

                    }
                });
            });
            
            
        });
    </script>
@endsection