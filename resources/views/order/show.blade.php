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
        .attBox{
            width: 100%;
            position: relative;
        }
        .attachDesign{
            overflow-x: hidden;
            width: 100%;
            display: block;

            /* hide scrollbar for mozila*/
            overflow-y: scroll;
            /*scrollbar-color:  red blue;*/
            scrollbar-width: none;
            /*position: relative;*/
        }
        .attachDesign::-webkit-scrollbar{
            display:none;
        }
        .attachDesignCon{
            min-width: 100%;
        }
        .designScroller{
            position: absolute;
            height: 100%;
            width: 40px;
            top: 0;
            z-index: 10;
            cursor: pointer;
            display: none;
        }
        .scrollRight{
            right: 0;
            background: linear-gradient(to left, rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
        }
        .scrollLeft{
            left: 0;
            background: linear-gradient(to right, rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
        }
        .mycards{
            height: 140px;
            width: 200px;
            background-position: center; 
            background-size: cover;
            float: left;
            display: inline-block;
            margin: 10px;

            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
            box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
            border: none;
        }
    </style>
@endsection
@section('content')
<div class="main-body">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="card">
                <div class="card-header w-100">
                    <h4>Order # {{$order->order_no}}</h4>
                </div>
                <div class="card-block w-100">
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="col-form-label">Order No.</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control autonumber form-control-primary" value="{{$order->order_no}}">
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label">Party name</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control autonumber form-control-primary" value="{{$order->party_name}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="col-form-label">Order Issue Date</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control autonumber form-control-primary" value="{{$order->issue_date}}">
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label">Order Delivery Date</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control autonumber form-control-primary" value="{{$order->delivery_date}}">
                        </div>
                        <div class="col-sm-12">                                
                                <div class="attBox">
                                    <div class="attachDesign" data-designs=",422">
                                        <div class="attachDesignCon">
                                        @foreach($order->designs as $designNumber => $design)
                                            <div class="mycards" style="background-image: url({{asset($designs[$designNumber][0]->picture)}})">
                                                <div class="card-block">
                                                    <div class="row align-items-end">
                                                        <div class="col-8">
                                                            <h4 class="">#{{$designNumber}}</h4>
                                                            <h6 class="text-white m-b-0"></h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                        <div class="designScroller scrollRight"></div>
                                        <div class="designScroller scrollLeft"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        var scrollerPosition = 0;
        var firstScrollerWidth = Math.round($(".attachDesign").width());
        var designCount = {{$totalDesign}};
        var totalRequiredWidth = designCount * 220;
        var designContainerWidth = $(".attachDesignCon").width();

        if(totalRequiredWidth > designContainerWidth) {
            $(".designScroller").show();
            $(document).ready(function () {
                $(".attachDesignCon").css("min-width", 5000);
            });   
        }

        // on scroll left
            $(".scrollRight").click(function() {
                if((scrollerPosition+220) < firstScrollerWidth){
                    scrollerPosition += 220
                    $('.attachDesign').animate({
                        scrollLeft: scrollerPosition
                    }, 300);
                }
            });
            $(".scrollLeft").click(function() {
                if(scrollerPosition >= 220) {
                    scrollerPosition -= 220
                    $('.attachDesign').animate({
                        scrollLeft: scrollerPosition
                    }, 300);
                }            
            });
    </script>
@endsection
