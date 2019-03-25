@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
@endsection
@section('content')
    <form action="{{route('design.store-design')}}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            </tr>
                            </thead>
                            <tbody id="append_parent">
                            @foreach($design->stones as $stone)
                                <tr>
                                    <td>{{$stone->size}}</td>
                                    <td>
                                        @if($stone->type == "BIG")
                                            <span class="label label-primary">BIG</span>
                                            @elseif($stone->type == "ROUND")
                                            <span class="label label-danger">ROUND</span>
                                        @endif

                                    </td>
                                    <td>{{$stone->quantity[0]}}</td>
                                    <td>{{$stone->quantity[1]}}</td>
                                    <td>{{$stone->quantity[2]}}</td>
                                    <td>{{$stone->quantity[3]}}</td>
                                    <td>{{$stone->quantity[4]}}</td>
                                    <td>{{$stone->price}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('design.edit', ['design' => $design->design_no])}}" class="btn btn-primary pull-right add-row">
                        <i class="fa fa-pencil"></i>&nbsp;&nbsp; Edit
                        </a>
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
    <script>
        $(document).ready(function () {
            var counter = 1;
            $("#rowAddButton").click(function () {
                var content = '<tr><td><input type="text" name="stones[' + counter +
                    '][size]"></td><td><input type="text" name="stones['+ counter +'][type]"></td> <td><input type="text" name="stones['+ counter +'][quantity][0]"></td><td><input type="text" name="stones['+ counter +'][quantity][1]"></td><td><input type="text" name="stones['+ counter +'][quantity][2]"></td><td><input type="text" name="stones['+ counter +'][quantity][3]"></td><td><input type="text" name="stones['+ counter +'][quantity][4]"></td><td><input type="text" name="stones['+ counter +'][price]"></td><td><a class="button button-small edit" title="Delete"><i class="fa fa-trash"></i></a></td></tr>';
                $("#append_parent").append(content);
                counter++;
            });
        });
    </script>
@endsection
