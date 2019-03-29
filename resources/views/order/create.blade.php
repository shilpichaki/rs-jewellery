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
<div class="row">
    <div class="offset-lg-1 col-lg-10">
        <div class="">
            <div class="card">
                <div class="card-header w-100">
                    <h4>Order aadhaar</h4>
                </div>
                <div class="card-block w-100">
                    <form action="{{route('order.store')}}" method="post">
                    @csrf
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order No.</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control autonumber form-control-primary" value="" required="" id="" name="order_no">
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Party Name</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control autonumber form-control-primary" value="" required="" id="" name="party_name">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Issue Date</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control autonumber form-control-primary" value="" required="" id="datepicker" name="issue_date">
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Delivery Date</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control autonumber form-control-primary" value="" required="" id="datepicker_1" name="delivery_date">
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-12">                                
                                <div class="attBox">
                                    <div class="attachDesign" data-designs="">
                                        <div class="attachDesignCon">
                                        </div>
                                        <div class="designScroller scrollRight"></div>
                                        <div class="designScroller scrollLeft"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" style="width: 170px;" class="btn btn-success pull-right add-row">
                                    <i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12 mb-3 addDesignDiv">
                <button type="button" class="btn btn-primary pull-right add-row btnAddDesign">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp; Add design
                </button>
            </div>
        </div>
    </div>
    <div class="offset-lg-1 col-lg-10">
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
                            @foreach($designs as $design)
                                <option value="{{$design->design_no}}">{{$design->design_no}}</option>
                            @endforeach
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
        </div>
    </div>
    </div>
</div>
<div id="dumpcontent">

</div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
        var cardCount = 1;
        var onCardTakesWidth = 220;
        var cardContainerwidth = 0;
        var scrollerPosition = 0;
        var firstScrollerWidth = Math.round($(".attachDesign").width());

        $(document).ready(function() {
            var design_no = '';
            var rootUrl = '{{env('ROOT_URL')}}';
            console.log(rootUrl);
            $('#designNo').on('change', function() {
                var content = '';
                cardContainerwidth = $(".attachDesignCon").width();
                cardContainerwidth = Math.round(cardContainerwidth);
                var totalStones = 0;

                design_no = $(this).val();
                    $.ajax({
                        url: '{{env('ROOT_URL')}}/api/design/'+design_no,
                        type: "GET",
                        success: function (data) {
                            if(data.code == 200) {
                                console.log(data.data);

                                totalStones = Object.keys(data.data.stones).length;

                                content += '<div class="container"><div class="row"><div class="col-md-4"><div class="row"><table class="table table-bordered" id=""><tbody><tr><td>Design Number:</td><td id="get_design_no" data-design_no='+data.data.design_no+'>'+data.data.design_no+'</td></tr></tbody></table></div></div><div class="col-md-8 text-center" style="border: 1px solid #8577cc;background-color: #eaffab;"><div class="row"><h6 class="pt-3">Bangle Design</h6></div></div></div><div class="row"><div class="col-md-2"><div class="row"><div data-imgurl="'+rootUrl+'/'+data.data.picture+'" id="img_preview" class="preview img-wrapper" style="background-image: url('+rootUrl+'/'+data.data.picture+');background-size: cover; background-position:center"></div></div></div><div class="col-md-10"><div class="row"><table class="table table-bordered" id="editableTable"><thead><tr><th>Stone Size</th><th>Stone Type</th><th>2.2</th><th>2.4</th><th>2.6</th><th>2.8</th><th>2.10</th><th class="text-left" id="total_stone_count" data-totalStoneCount="'+totalStones+'">Stone count</th></tr></thead><tbody>';
                                var input_index_counter = 0;
                                $.each(data.data.stones, function (index, value) {
                                    content += '<tr><td>'+value.size+'</td><td><span class="label label-danger">'+value.type+'</span></td><td>'+value.quantity[0]+'</td><td>'+value.quantity[1]+'</td><td>'+value.quantity[2]+'</td><td>'+value.quantity[3]+'</td><td>'+value.quantity[4]+'</td><td><input id="stone_count_'+input_index_counter+'" class="form-control form-control-primary" type="text" required="" title=""></td></tr>';

                                    input_index_counter++;
                                });

                                content += '<tr><td colspan="2">Order Quantity Set.</td><td><input class="form-control form-control-primary" type="text" required="" title="" id="oqs22"></td><td><input class="form-control form-control-primary" type="text" required="" title="" id="oqs24"></td><td><input id="oqs26" class="form-control form-control-primary" type="text" required="" title=""></td><td><input id="oqs28" class="form-control form-control-primary" type="text" required="" title=""></td><td><input id="oqs210" class="form-control form-control-primary" type="text" required="" title=""></td><td></td></tr><tr><td colspan="2">Order Quantity Pcs.</td><td><input  id="oqp22" class="form-control form-control-primary" type="text" required="" title=""></td><td><input id="oqp24" class="form-control form-control-primary" type="text"  required="" title=""></td><td><input id="oqp26" class="form-control form-control-primary" type="text" required="" title=""></td><td><input id="oqp28" class="form-control form-control-primary" type="text" required="" title=""></td><td><input id="oqp210" class="form-control form-control-primary" type="text"  required="" title=""></td><td></td></tr>';

                                // $.each(data.data.stones, function(index, value) {
                                //     content += '<tr><td>Stone count '+value.size+'</td><td colspan="6"><input class="form-control form-control-primary" type="text" name="stones[0][quantity][0]" required="" pattern="\d+" title=""></td></tr>'
                                // });

                                content += '</tbody></table><button style="margin-top:15px; margin-left:10px;" class="btn btn-success" id="choosing_complete">Confirm</button><button style="margin-top:15px; margin-left:10px;" class="btn btn-primary" id="choosing_more">Add more design</button></div></div></div></div><br><br></div>';

                                // $('#dumpcontent').html('');
                                $('#dumpcontent').html(content);
                                
                                $('.btnAddDesign').hide();
                                $('.addDesign').hide();
                                $('html, body').animate({
                                    scrollTop: ($("#dumpcontent").offset().top - 60)
                                }, 500);
                            }
                        }
                    });
            });

            // onclick of confirm
            $('body').on('click', '#choosing_complete', function() {
                $("#choosing_more").trigger('click');
                $(".addDesign").hide();
            });

            // onclick of addMore
            $('body').on('click', '#choosing_more', function() {
                $('.addDesign').show();
                $('html, body').animate({
                    scrollTop: $(".btnAddDesign").offset().top
                }, 500);
                
                var contentToDump = '';
                var img_preview_url = $("#img_preview").attr('data-imgurl');
                var get_design_no = $("#get_design_no").attr('data-design_no');
                var total_stone_count =$("#total_stone_count").attr('data-totalStoneCount');

                contentToDump += '<div class="mycards" style="background-image: url('+img_preview_url+')" ><div class="card-block"><div class="row align-items-end"><div class="col-8"><h4 class="text-white">#'+get_design_no+'</h4><h6 class="text-white m-b-0"></h6></div><div class="col-4 text-right">';
                

                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][design_no]" value="'+get_design_no+'"><input type="hidden" name="designs['+get_design_no+'][oc][0][oqs]" value="'+$("#oqs22").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][1][oqs]" value="'+$("#oqs24").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][2][oqs]" value="'+$("#oqs26").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][3][oqs]" value="'+$("#oqs28").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][4][oqs]" value="'+$("#oqs210").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][0][oqp]" value="'+$("#oqp22").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][1][oqp]" value="'+$("#oqp24").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][2][oqp]" value="'+$("#oqp26").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][3][oqp]" value="'+$("#oqp28").val()+'"><input type="hidden" name="designs['+get_design_no+'][oc][4][oqp]" value="'+$("#oqp210").val()+'">';

                for (var i = 0; i < total_stone_count; i++) {
                    contentToDump += '<input type="hidden" name="designs['+get_design_no+'][stone_count]['+i+']" value="'+$("#stone_count_"+i).val()+'">';
                }

                contentToDump +='</div></div></div></div>';

                $('#dumpcontent').html('');

                if(isDesignAlreadyAdded(get_design_no) == false) {
                    
                    $('.attachDesignCon').append(contentToDump);

                    if((cardCount*onCardTakesWidth) > cardContainerwidth) {
                        $(".designScroller").show();
                        $('.attachDesign').css('overflow-x', 'scroll');
                        $(".attachDesignCon").css('min-width', (cardCount*onCardTakesWidth));
                    }
                    cardCount++;
                }
            });
        });
        function isDesignAlreadyAdded (design_no) {
            var added_designs = $(".attachDesign").attr("data-designs");
            var added_designs = added_designs.split(',')

            if ($.inArray(design_no, added_designs) != -1) {
                return true;
            } else {
                added_designs.push(design_no); 
                $(".attachDesign").attr("data-designs", added_designs);
                return false;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.btnAddDesign').on("click", function(){
                $('.addDesign').show();
            });

            // on scroll left
            $(".scrollRight").click(function() {
                if((scrollerPosition+220) < firstScrollerWidth){
                    scrollerPosition += 220
                    $('.attachDesign').animate({
                        scrollLeft: scrollerPosition
                    }, 300);
                }
                console.log(scrollerPosition+'  '+firstScrollerWidth+'    '+cardContainerwidth);
            });
            $(".scrollLeft").click(function() {
                if(scrollerPosition >= 220) {
                    scrollerPosition -= 220
                    $('.attachDesign').animate({
                        scrollLeft: scrollerPosition
                    }, 300);
                }
                console.log(scrollerPosition+'  '+firstScrollerWidth+'    '+cardContainerwidth);                
            });
        });
    </script>
@endsection
