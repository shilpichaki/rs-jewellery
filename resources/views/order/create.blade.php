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
    <h2 class="text-center py-3">Add Order</h2>
<div class="row">
    <div class="offset-lg-1 col-lg-10">
        <div class="">
            <div class="card">
                {{--<div class="card-header w-100">--}}
                    {{--<h4>Order aadhaar</h4>--}}
                {{--</div>--}}
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
                                <input type="date" class="form-control autonumber form-control-primary" value="" required="" id="" name="issue_date">
                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Order Delivery<br> Date</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control autonumber form-control-primary" value="" required="" id="" name="delivery_date">
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
                                <button type="submit" style="width: 170px;" class="btn btn-success pull-right add-row" id="btn_submit">
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
            $( "#datepicker" ).datepicker({
                dateFormat: "dd-mm-yy"
            });
            $( "#datepicker_1" ).datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
    </script>
    <script>
        var cardCount = 1;
        var onCardTakesWidth = 220;
        var cardContainerwidth = 0;
        var scrollerPosition = 0;
        var firstScrollerWidth = Math.round($(".attachDesign").width());
        $('#btn_submit').attr('disabled', true);

        $(document).ready(function() {
            var design_no = '';
            var rootUrl = '{{env('ROOT_URL')}}';
            
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
//                                console.log(data.data);

                                totalStones = Object.keys(data.data.stones).length;

                                content += '<div class="container">';
                                content += '<div class="row">';
                                content += '<div class="col-md-5">';
                                content += '<div class="row">';
                                content += '<table class="table table-bordered" id="">';
                                content += '<tbody>';
                                content += '<tr>';
                                content += '<td class="ts">Design Number:</td>';
                                content += '<td id="get_design_no" data-design_no='+data.data.design_no+'>'+data.data.design_no+'</td>';
                                content += '</tr>';
                                content += '</tbody>';
                                content += '</table>';
                                content += '</div>';
                                content += '</div>';
                                content += '<div class="col-md-7 text-center" style="border: 1px solid #8577cc;background-color: #eaffab;">';
                                content += '<div class="row">';
                                content += '<h6 class="pt-3 ts">Bangle Design</h6>';
                                content += '</div>';
                                content += '</div>';
                                content += '</div>';
                                content += '<div class="row">';
                                content += '<div class="col-md-2">';
                                content += '<div class="row p-2">';
                                content += '<div data-imgurl="'+rootUrl+'/'+data.data.picture+'" id="img_preview" class="preview img-wrapper rounded" style="background-image: url('+rootUrl+'/'+data.data.picture+');background-size: cover; background-position:center">';
                                content += '</div>';
                                content += '</div>';
                                content += '</div>';
                                content += '<div class="col-md-10">';
                                content += '<div class="row">';
                                content += '<table class="table table-bordered" id="editableTable">';
                                content += '<thead>';
                                content += '<tr>';
                                content += '<th>Stone Size</th>';
                                content += '<th>Stone Type</th>';
                                content += '<th>Stone Color</th>';
                                content += '<th>2.2</th>';
                                content += '<th>2.4</th>';
                                content += '<th>2.6</th>';
                                content += '<th>2.8</th>';
                                content += '<th>2.10</th>';
                                content += '<th class="text-left" id="total_stone_count" data-totalStoneCount="'+totalStones+'">Stone count';
                                content += '</th>';
                                content += '</tr>';
                                content += '</thead>';
                                content += '<tbody>';

                                var input_index_counter = 0;

                                $.each(data.data.stones, function (index, value) {
                                    content += '<tr>';
                                    content += '<td>'+value.size+'</td>';
                                    content += '<td><span class="label label-danger">'+value.stone_type+'</span></td>';
                                    content += '<td>'+value.stone_color+'</td>';
                                    content += '<td data-stone-row="'+input_index_counter+'" data-bangle-size="2.2">'+value.quantity[0]+'</td>';
                                    content += '<td data-stone-row="'+input_index_counter+'"  data-bangle-size="2.4">'+value.quantity[1]+'</td>';
                                    content += '<td data-stone-row="'+input_index_counter+'"  data-bangle-size="2.6">'+value.quantity[2]+'</td>';
                                    content += '<td data-stone-row="'+input_index_counter+'"  data-bangle-size="2.8">'+value.quantity[3]+'</td>';
                                    content += '<td data-stone-row="'+input_index_counter+'"  data-bangle-size="2.10">'+value.quantity[4]+'</td>';
                                    content += '<td>';
                                    content += '<input id="stone_count_'+input_index_counter+'" class="form-control form-control-primary calc_stone_count_input" data-stone-size="'+value.size+'" type="text" required="" title="" readonly>';
                                    content += '</td>';
                                    content += '</tr>';

                                    input_index_counter++;
                                });

                                content += '<tr>';
                                content += '<td colspan="3">Order Quantity Set.</td>';
                                content += '<td><input class="form-control form-control-primary input_oqs input-required checkData" data-bangle-size="2.2" type="text" required="" title="" id="oqs22">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input class="form-control form-control-primary input_oqs input-required checkData" data-bangle-size="2.4" type="text" required="" title="" id="oqs24">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqs26" class="form-control form-control-primary input_oqs input-required checkData" data-bangle-size="2.6" type="text" required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqs28" class="form-control form-control-primary input_oqs input-required checkData" data-bangle-size="2.8" type="text" required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqs210" class="form-control form-control-primary input_oqs input-required checkData" data-bangle-size="2.10" type="text" required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<button style="width: 100%;" class="btn btn-success" id="calc_st_cnt" data-total-rows="'+input_index_counter+'">Calculate Stone Count</button>';
                                content += '</td>';
                                content += '</tr>';
                                content += '<tr>';
                                content += '<td colspan="3">Order Quantity Pcs.</td>';
                                content += '<td>';
                                content += '<input  id="oqp22" class="form-control form-control-primary input_oqp" data-bangle-size="2.2" type="text" required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqp24" class="form-control form-control-primary input_oqp" data-bangle-size="2.4" type="text"  required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqp26" class="form-control form-control-primary input_oqp" data-bangle-size="2.6" type="text" required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqp28" class="form-control form-control-primary input_oqp" data-bangle-size="2.8" type="text" required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="oqp210" class="form-control form-control-primary input_oqp" data-bangle-size="2.10" type="text"  required="" title="">';
                                content += '</td>';
                                content += '<td>';
                                content += '</td>';
                                content += '</tr>';

                                content += '<tr>';
                                content += '<td>Rhodium</td>';
                                content += '<td>';
                                content += '<input id="rhodium1" class="form-control form-control-primary" type="text">';
                                content += '</td>';
                                content += '<td>';
                                content += '<input id="rhodium2" class="form-control form-control-primary" type="text">';
                                content += '</td>';
                                content += '<td colspan="2">';
                                content += '<input id="rhodium3" class="form-control form-control-primary" type="text">';
                                content += '</td>';
                                content += '<td colspan="5">';
                                content += '</td>';
                                content += '</tr>';

                                content += '</tbody>';
                                content +='</table>';
                                content +='<button style="margin-top:15px; margin-left:10px;" class="btn btn-success" id="choosing_complete"><i class="fa fa-paper-plane"></i>Confirm</button>';
                                content +='<button style="margin-top:15px; margin-left:10px;" class="btn btn-primary" id="choosing_more"><i class="fa fa-plus"></i>Add more design</button>';
                                content +='<button style="margin-top:15px; margin-left:10px;" class="btn btn-success" id="cancle"><i class="fa fa-window-close"></i>Cancel</button>';
                                content +='</div>';
                                content +='</div>';
                                content +='</div>';
                                content +='</div>';
                                content +='<br><br>';
                                content +='</div>';

                                // $('#dumpcontent').html('');
                                $('#dumpcontent').html(content);
                                
                                $('.btnAddDesign').hide();
                                $('.addDesign').hide();
                                //confirm button disable 
                                $('#choosing_complete').attr('disabled', true);
                                $('html, body').animate({
                                    scrollTop: ($("#dumpcontent").offset().top - 60)
                                }, 500);

                                //confirm enable after all value filled
                                $('input.checkData').on('keyup blur', function() {
                                    var empty = false;
                                    $('input.checkData').each(function() {
                                        if($(this).val() == '') {
                                            empty = true;
                                        }
                                    });

                                    if(empty) {
                                        $('#choosing_complete').attr('disabled', true);
                                    }
                                    else {
                                        $('#choosing_complete').removeAttr('disabled');
                                    }
                                });
                            }
                        }
                    });
            });

            // onclick of confirm
            $('body').on('click', '#choosing_complete', function() {
                $("#choosing_more").trigger('click');
                $(".addDesign").hide();
                $('#btn_submit').removeAttr('disabled');
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

                contentToDump += '<div class="mycards" style="background-image: url('+img_preview_url+')" >';
                contentToDump += '<div style="background: #0808081f;height: 100%;">';
                contentToDump += '<div class="card-block">';
                contentToDump += '<div class="row align-items-end">';
                contentToDump += '<div class="col-6">';
                contentToDump += '<h4 class="text-white">#'+get_design_no+'</h4>';
                contentToDump += '<h6 class="text-white m-b-0">';
                contentToDump += '</h6>';
                contentToDump += '</div>';
                contentToDump += '<div class="col-4 text-right">';
                

                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][design_no]" value="'+get_design_no+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][0][oqs]" value="'+$("#oqs22").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][1][oqs]" value="'+$("#oqs24").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][2][oqs]" value="'+$("#oqs26").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][3][oqs]" value="'+$("#oqs28").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][4][oqs]" value="'+$("#oqs210").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][0][oqp]" value="'+$("#oqp22").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][1][oqp]" value="'+$("#oqp24").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][2][oqp]" value="'+$("#oqp26").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][3][oqp]" value="'+$("#oqp28").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][oc][4][oqp]" value="'+$("#oqp210").val()+'">';

                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][rhodium][1]" value="'+$("#rhodium1").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][rhodium][2]" value="'+$("#rhodium2").val()+'">';
                contentToDump += '<input type="hidden" name="designs['+get_design_no+'][rhodium][3]" value="'+$("#rhodium3").val()+'">';

                for (var i = 0; i < total_stone_count; i++) {
                    contentToDump += '<input type="hidden" name="designs['+get_design_no+'][stone_count]['+i+']" value="'+$("#stone_count_"+i).val()+'">';
                }

                contentToDump += '</div>';
                contentToDump += '<div class="col-2">';
                contentToDump += '<div class="row">';
                contentToDump += '<button type="button" class="closeCard" data-design="'+get_design_no+'">';
                contentToDump += '<i style="cursor:pointer" class="fa fa-times p-2"></i>';
                contentToDump += '</button></div></div>';
                contentToDump += '</div></div></div></div>';

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
            var added_designs = added_designs.split(',');

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

            // on change order quantity set
            $("body").on('keyup', '.input_oqs', function() {
                var bangleSize = $(this).attr('data-bangle-size');
                var value = $(this).val();

                if(value != '') {
                    var quantity = parseInt(value);
                    $('.input_oqp[data-bangle-size="'+bangleSize+'"]').val((quantity*4));
                }
            });

            $("body").on('click', '#calc_st_cnt', function() {
                var totalRows = $(this).attr("data-total-rows");

                var show = checkIfEverythingFilledUp();

                calculateStoneCount(totalRows);
            });
        });
    </script>
    <script type="text/javascript">
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
        $("body").on('keyup blur', '.input-required', function() {
            if($(this).val() != '') {
                $(this).removeClass('border-danger');
            }
        });

        function calculateStoneCount(totalRows)
        {
            for (var i = 0 ; i < totalRows; i++) {
                var total = 0;
                for (var j = 2; j <= 10; j=j+2) {
                    var value = $('td[data-stone-row="'+i+'"][data-bangle-size="2.'+j+'"]').html();
                    var value = value * $("#oqp2"+j).val();
                    total = total + value;
                }
                $("#stone_count_"+i).val(total);
                console.log(total);
            }
        }

        $(document).ready(function() {
            $( 'body' ).on("click",".closeCard",function() {
                var designNumberToBeRemoved = $(this).attr('data-design');
                var designNumbers = $('.attachDesign').attr('data-designs');
                designNumbers = designNumbers.split(',');
                console.log(designNumbers);
                var index = designNumbers.indexOf(designNumberToBeRemoved);
                console.log(index);
                if (index > -1) {
                    designNumbers.splice(index, 1);
                }
                $('.attachDesign').attr('data-designs', designNumbers );
                $(this).closest( '.mycards' ).remove();
            });
        });

        //cancling the content dumped
        $(document).ready(function() {
            $( 'body' ).on("click","#cancle",function() {
                $('#dumpcontent').html('');
                $('.addDesign').show();
                $('html, body').animate({
                    scrollTop: $(".btnAddDesign").offset().top
                }, 500);
            });
        });
    </script>
@endsection
