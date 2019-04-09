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
        height: 150px;
        width: 150px;
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
</style>
@endsection
@section('content')
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
                                <div class="form-control autonumber form-control-primary">{{$order->order_no}}</div>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Party name</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">{{$order->party_name}}</div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Issue Date</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">{{$order->issue_date}}</div>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Delivery Date</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">{{$order->delivery_date}}</div>
                            </div>
                            <div class="col-sm-12">
                                <a href="{{route('order.edit', ['order' => $order->order_no])}}" style="width: 170px; margin-top: 12px;" class="btn btn-success pull-right add-row">
                                    <i class="fa fa-pencil"></i>&nbsp;&nbsp; Edit order
                                </a>
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
                                <li>
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
                                                                    data-totalstonecount="4">Stone count</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($design->stone_count as $scKey => $stoneCount)
                                                            <tr>
                                                                <td>{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->size}}</td>
                                                                <td>{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->stone_type}}
                                                                </td>
                                                                <td>{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->stone_color}}</td>
                                                                <td data-stone-row="0" data-bangle-size="2.2">{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[0]}}</td>
                                                                <td data-stone-row="0" data-bangle-size="2.4">{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[1]}}</td>
                                                                <td data-stone-row="0" data-bangle-size="2.6">{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[2]}}</td>
                                                                <td data-stone-row="0" data-bangle-size="2.8">{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[3]}}</td>
                                                                <td data-stone-row="0" data-bangle-size="2.10">{{json_decode($masterDesigns[$designNumber][0]->stones)[$scKey]->quantity[4]}}</td>
                                                                <td><div class="form-control form-control-primary"><span>{{$stoneCount}}</span></div></td>
                                                            </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Set.</td>
                                                                @foreach($design->oc as $orderCount)
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>{{$orderCount->oqs}}</span>
                                                                    </div>
                                                                </td>
                                                                @endforeach
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Pcs.</td>
                                                                @foreach($design->oc as $orderCount)
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>{{$orderCount->oqp}}</span>
                                                                    </div>
                                                                </td>
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Rhodium</td>
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            <?php echo((array) $design->rhodium)[1]; ?>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            <?php echo((array) $design->rhodium)[2]; ?>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            <?php echo((array) $design->rhodium)[3]; ?>
                                                                        </span>
                                                                    </div>
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
@endsection

@section('js')
<script type="text/javascript">
    var scrollerPosition = 0;
    var firstScrollerWidth = Math.round($(".attachDesign").width());
    var designCount = {
        {
            $totalDesign
        }
    };
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
        $(".mycards").click(function () {
            var designNumber = $(this).attr("data-design-number");
            $('#dumpcontent').html("<h1>" + designNumber + "</h1>");
        });
    });

</script>
@endsection
