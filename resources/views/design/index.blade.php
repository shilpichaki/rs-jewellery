@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<h2 class="text-center pt-3">All Designs</h2>
<div class="page-wrapper">
    <div class="card">
        {{--<div class="card-header">--}}
        {{--<h4>Hover Table</h4>--}}
        {{--<span>use class <code>table-hover</code> inside table element</span>--}}

        {{--</div>--}}
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="/*max-width: 30px;*/" class="text-center">Design No.</th>
                            <th>Picture</th>
                            <th>Price (4pcs)</th>
                            <th>Stone Colors</th>
                            <th>Edit Design</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($designs->count() == 0)
                        <tr>
                            <th colspan="5" class="text-center">No Data Found!</th>
                        </tr>
                        @else
                        @foreach($designs as $design)
                        <tr>
                            <th scope="row" style="max-width: 30px;" class="text-center">{{$design->design_no}}</th>
                            <td>
                                <div style="width: 60px; height: 60px">
                                    <a href="{{route('design.show', ['design' => $design->design_no])}}">
                                        <img src="{{asset($design->picture)}}" alt="Design"
                                            style="width: 100%; border-radius: 5px; overflow: hidden;">
                                    </a>
                                </div>
                            </td>
                            <td>{{$design->price_4pcs}}</td>
                            <td>
                                <?php
                                        foreach (json_decode($design->unique_stone_colors) as $color) {
                                            echo $color . " ";
                                        }
                                    ?>
                            </td>
                            <td>
                                <a href="{{route('design.edit', ['design' => $design->design_no])}}"
                                    class="btn btn-primary add-row">
                                    <i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
