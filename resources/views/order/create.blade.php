@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.steps.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
       .addDesign {
           display: none;
       }
    </style>
@endsection
@section('content')
    <div class="row">

        <div class="offset-lg-1 col-lg-10">

            <div class="card">

                <div class="card-header w-100">
                    <h4>Order aadhaar</h4>
                    {{--<span>Form for <code>Job card</code></span>--}}

                </div>
                <div class="card-block w-100">

                    <form action="" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order No.</label>
                            </div>
                            <div class="col-sm-4">

                                <input type="number" class="form-control autonumber form-control-primary" value="" required="" id="" name="">
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
                                <label class="col-form-label">Order Issue Date</label>
                            </div>
                            <div class="col-sm-4">

                                <input type="text" class="form-control autonumber form-control-primary" value="" required="" id="datepicker" name="">
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Delivery Date</label>
                            </div>
                            <div class="col-sm-4">

                                <input type="text" class="form-control autonumber form-control-primary" value="" required="" id="datepicker_1" name="">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                </div>
            </div>

                        <div class="row form-group">
                            <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-primary pull-right add-row btnAddDesign">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp; Add design
                                </button>
                            </div>
                        </div>
            <div class="addDesign">
                <div class="card">
                    <div class="card-block w-100">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Design No.</label>
                            </div>
                            <div class="col-sm-4">

                                <select class="form-control form-control-primary" name="" id="designNo">
                                    <option value="">Select one</option>
                                    <option value="421">421</option>
                                    <option value="422">422</option>
                                    <option value="423">423</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Design Rate (Unit Avg. Price)</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control autonumber form-control-primary" value="" required="" id="" name="">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        </div>

                    </form>
            </div>
            </div>

        </div>
    </div>
    <div id="dumpcontent">

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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker_1" ).datepicker();
        } );
    </script>
    <script>
        $(document).ready(function() {
            var design_no = '';
            var content = '';
            var rootUrl = '{{env('ROOT_URL')}}';
            console.log(rootUrl);
            $('#designNo').on('change', function() {
                design_no = $(this).val();
                console.log(design_no);

                    $.ajax({
                        url: '{{env('ROOT_URL')}}/api/design/'+design_no,
                        type: "GET",
//                        error: function () {
//                            $('#design_no').removeClass('border-danger');
//                            $('#design_no_tooltip').hide();
//                            $('#submit_btn').prop('disabled', false);
//                        },
                        success: function (data) {
                            if(data.code == 200) {
                                console.log(data);
                                content += '<div class="container"><div class="row"><div class="col-md-4"><div class="row"><table class="table table-bordered" id=""><tbody><tr><td>Design Number:</td><td>'+data.data.design_no+'</td></tr></tbody></table></div></div><div class="col-md-8 text-center" style="border: 1px solid #dee2e6"><div class="row"><h6 class="pt-3">Bangle Design</h6></div></div></div><div class="row"><div class="col-md-2"><div class="row"><div class="preview img-wrapper" style="background-image: url('+rootUrl+'/'+data.data.picture+');background-size: cover; background-position:center"></div></div></div><div class="col-md-10"><div class="row"><table class="table table-bordered" id="editableTable"><thead><tr><th>Stone Size</th><th>Stone Type</th><th>2.2</th><th>2.4</th><th>2.6</th><th>2.8</th><th>2.10</th><th>Price</th></tr></thead><tbody>';

                                $.each(data.data.stones, function (index, value) {
                                    content += '<tr><td>'+value.size+'</td><td><span class="label label-danger">'+value.type+'</span></td><td>'+value.quantity[0]+'</td><td>'+value.quantity[1]+'</td><td>'+value.quantity[2]+'</td><td>'+value.quantity[3]+'</td><td>'+value.quantity[4]+'</td><td>'+value.price+'</td></tr>';
                                });

                                content += '</tbody></table></div></div></div></div></div>';

                                $('#dumpcontent').html(content);
                            }
                        }
                    });

            });
        });

    </script>
    <script>
        $(document).ready(function() {
         $('body').on("click",".btnAddDesign", function(){
             $('.addDesign').show();
        });
        });

    </script>
@endsection
