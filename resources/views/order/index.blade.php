@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <h2 class="text-center pt-3">All Orders</h2>
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
                            <th style="/*max-width: 30px;*/" class="text-center">Order No.</th>
                            <th>Party Name</th>
                            <th>Issue Date</th>
                            <th>Delivery Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row" style="max-width: 30px;" class="text-center">
                                    {{$order->order_no}}
                                </th>

                                <td>{{$order->party_name}}</td>
                                <td>{{$order->issue_date}}</td>
                                <td>{{$order->delivery_date}}</td>
                                <td>
                                    <a href="{{route('order.show', ['order' => $order->order_no])}}" class="btn btn-primary add-row">
                                        <i class="fa fa-eye"></i>&nbsp;&nbsp;Show Order
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection