@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
@endsection
@section('content')
    <form action="{{route('design.update-design', ['design' => $design->design_no])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <table class="table table-bordered" id="">
                            <tbody>
                            <tr>
                                <td>Design Number:</td>
                                <td>{{$design->design_no}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 text-center" style="border: 1px solid #dee2e6">
                    <div class="row">
                        <h6 class="pt-3">Bangle Design</h6>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <div class="preview img-wrapper" style="background-image: url({{asset($design->picture)}});background-size: cover; background-position:center"></div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <table class="table table-bordered" id="editableTable">
                            <thead>
                            <tr>
                                <th>Stone Size</th>
                                <th>Stone Type</th>
                                <th>2.2</th>
                                <th>2.4</th>
                                <th>2.6</th>
                                <th>2.8</th>
                                <th>2.10</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="append_parent">
                            <?php $counter=0; ?>
                            @foreach($design->stones as $key => $stone)
                                <tr id="add_stone_row_{{$key}}">
                                    <td><input type="text" name="stones[{{$key}}][size]" value="{{$stone->size}}" pattern="\d+.\d{2}" title="Example: 1.26, 1.80" required></td>
                                    <td>
                                        <select name="stones[{{$key}}][type]" id="">
                                            <option value="BIG"
                                                    @if($stone->type == "BIG")
                                                    selected
                                                    @endif
                                            >BIG</option>
                                            <option value="ROUND"
                                                    @if($stone->type == "ROUND")
                                                    selected
                                                    @endif
                                            >ROUND</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="stones[{{$key}}][quantity][0]" value="{{$stone->quantity[0]}}"  required pattern="\d+" title=""></td>
                                    <td><input type="text" name="stones[{{$key}}][quantity][1]" value="{{$stone->quantity[1]}}"  required pattern="\d+" title=""></td>
                                    <td><input type="text" name="stones[{{$key}}][quantity][2]" value="{{$stone->quantity[2]}}"  required pattern="\d+" title=""></td>
                                    <td><input type="text" name="stones[{{$key}}][quantity][3]" value="{{$stone->quantity[3]}}"  required pattern="\d+" title=""></td>
                                    <td><input type="text" name="stones[{{$key}}][quantity][4]" value="{{$stone->quantity[4]}}"  required pattern="\d+" title=""></td>
                                    <td><input type="text" name="stones[{{$key}}][price]" value="{{$stone->price}}" required pattern="\d+.\d{2}" title="Example: 500.00, 1000.70"></td>
                                    <td>
                                        <button type="button" data-id="{{$key}}" class="delete_row_btn btn btn-primary button button-small" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php $counter++ ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary button button-small edit">Submit
                    </button>
                    <button type="button" class="btn btn-primary pull-right add-row" id="rowAddButton">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp; Add
                        Row</button>
                </div>
            </div>
        </div>
    </form>



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
    <script type="text/javascript">
        $(document).ready(function () {
            var counter = {{$lastKey}};
            $("#rowAddButton").click(function () {
                var content = '<tr id="add_stone_row_'+counter+'"><td><input type="text" name="stones['+counter+'][size]" pattern="\\d+.\\d{2}" title="Example: 1.26, 1.80" required></td><td><select name="stones['+counter+'][type]" id=""><option value="BIG">BIG</option><option value="ROUND">ROUND</option></select></td><td><input type="text" name="stones['+counter+'][quantity][0]" required pattern="\\d+" title=""></td><td><input type="text" name="stones['+counter+'][quantity][1]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][quantity][2]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][quantity][3]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][quantity][4]" required pattern="\\d+"></td><td><input type="text" name="stones['+counter+'][price]" required pattern="\\d+.\\d{2}" title="Example: 500.00, 1000.70"></td><td><button type="button" data-id="'+counter+'" class="delete_row_btn btn btn-primary button button-small" title="Delete"><i class="fa fa-trash"></i></button></td></tr>';
                $("#append_parent").append(content);
                counter++;
            });
        });
    </script>

    <script type="text/javascript">
        // delete row
        $(document).ready(function() {
            var dataId  = 0; 
            $('body').on('click','.delete_row_btn',function(){
            // $('.delete_row_btn').click(function() {
                dataId = $(this).attr('data-id');
                console.log(dataId);
                $("#add_stone_row_"+dataId).remove();
            });
        });
    </script>
@endsection
