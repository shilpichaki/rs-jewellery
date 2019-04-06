@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-ui css-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <h2 class="text-center py-3">Order Allocation</h2>
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="">
                <div class="card">
                    <div class="card-block w-100">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Order No.</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">
                                    <span>{{$order->order_no}}</span>
                                </div>

                                <span class="form-bar"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Party Name</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">
                                    <span>{{$order->party_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="col-form-label">Delivery Date</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-control autonumber form-control-primary">
                                    <span>{{$order->delivery_date}}</span>
                                </div>
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
                                                                <li>
                                    <div class="card list-view-media">
                                        <div class="card-block w-100">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <div class="card-list-img" style="background-image: url(http://127.0.0.1:8000/storage/pictures//11554378125.jpeg)">
                                                    </div>
                                                </a>
                                                <div class="media-body">
                                                    <div class="col-xs-12">
                                                        <h2 class="d-inline-block">#423da</h2>
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
                                                                <th class="text-left" id="total_stone_count" data-totalstonecount="4">Stone count</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                                                                        <tr>
                                                                <td>1.60</td>
                                                                <td>BIG STONE
                                                                </td>
                                                                <td>GREEN</td>
                                                                <td data-stone-row="0" data-bangle-size="2.2">1</td>
                                                                <td data-stone-row="0" data-bangle-size="2.4">3</td>
                                                                <td data-stone-row="0" data-bangle-size="2.6">5</td>
                                                                <td data-stone-row="0" data-bangle-size="2.8">4</td>
                                                                <td data-stone-row="0" data-bangle-size="2.10">7</td>
                                                                <td><div class="form-control form-control-primary"><span>352</span></div></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Set.</td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>5</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>9</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>1</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>4</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>5</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Pcs.</td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>20</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>36</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>4</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>16</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>20</span>
                                                                    </div>
                                                                </td>
                                                                                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Rhodium</td>
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            5                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            5                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            7                                                                        </span>
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
                                                                <li>
                                    <div class="card list-view-media">
                                        <div class="card-block w-100">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <div class="card-list-img" style="background-image: url(http://127.0.0.1:8000/storage/pictures//11554368030.jpeg)">
                                                    </div>
                                                </a>
                                                <div class="media-body">
                                                    <div class="col-xs-12">
                                                        <h2 class="d-inline-block">#423</h2>
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
                                                                <th class="text-left" id="total_stone_count" data-totalstonecount="4">Stone count</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                                                                        <tr>
                                                                <td>1.60</td>
                                                                <td>ROUND STONE
                                                                </td>
                                                                <td>GREEN</td>
                                                                <td data-stone-row="0" data-bangle-size="2.2">1</td>
                                                                <td data-stone-row="0" data-bangle-size="2.4">1</td>
                                                                <td data-stone-row="0" data-bangle-size="2.6">1</td>
                                                                <td data-stone-row="0" data-bangle-size="2.8">1</td>
                                                                <td data-stone-row="0" data-bangle-size="2.10">1</td>
                                                                <td><div class="form-control form-control-primary"><span>60</span></div></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td>1.80</td>
                                                                <td>ROUND STONE
                                                                </td>
                                                                <td>GREEN</td>
                                                                <td data-stone-row="0" data-bangle-size="2.2">1</td>
                                                                <td data-stone-row="0" data-bangle-size="2.4">5</td>
                                                                <td data-stone-row="0" data-bangle-size="2.6">3</td>
                                                                <td data-stone-row="0" data-bangle-size="2.8">11</td>
                                                                <td data-stone-row="0" data-bangle-size="2.10">5</td>
                                                                <td><div class="form-control form-control-primary"><span>252</span></div></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td>1.40</td>
                                                                <td>BIG STONE
                                                                </td>
                                                                <td>BLUE</td>
                                                                <td data-stone-row="0" data-bangle-size="2.2">2</td>
                                                                <td data-stone-row="0" data-bangle-size="2.4">5</td>
                                                                <td data-stone-row="0" data-bangle-size="2.6">7</td>
                                                                <td data-stone-row="0" data-bangle-size="2.8">8</td>
                                                                <td data-stone-row="0" data-bangle-size="2.10">7</td>
                                                                <td><div class="form-control form-control-primary"><span>352</span></div></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td>1.85</td>
                                                                <td>TB STONE
                                                                </td>
                                                                <td>RED</td>
                                                                <td data-stone-row="0" data-bangle-size="2.2">5</td>
                                                                <td data-stone-row="0" data-bangle-size="2.4">7</td>
                                                                <td data-stone-row="0" data-bangle-size="2.6">8</td>
                                                                <td data-stone-row="0" data-bangle-size="2.8">9</td>
                                                                <td data-stone-row="0" data-bangle-size="2.10">4</td>
                                                                <td><div class="form-control form-control-primary"><span>412</span></div></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Set.</td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>3</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>2</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>6</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>2</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>2</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-left">Order Quantity Pcs.</td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>12</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>8</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>24</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>8</span>
                                                                    </div>
                                                                </td>
                                                                                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>8</span>
                                                                    </div>
                                                                </td>
                                                                                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Rhodium</td>
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            5                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            8                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="form-control form-control-primary">
                                                                        <span>
                                                                            7                                                                        </span>
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
                                                            </ul>
                        </div>
                    </div>
                </div>
                <!-- List view card end -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    
@endsection