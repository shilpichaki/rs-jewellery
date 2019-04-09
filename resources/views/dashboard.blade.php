@extends('layouts.master')

{{--@section('title')--}}
    {{--Dashboard Content--}} 

{{--@endsection --}}

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Romanesco" rel="stylesheet">
    <style>
        h5 {
            font-size: 1.15rem;
        }
    </style>
@endsection

@section('content')
 <h2 class="text-center my-5" style="font-size: 3vw;">Welcome to <img src="{{asset('image/fa-fa-rps.png')}}"  style="height: 182px;width: 250px;" alt="RPS Jewellery Logo"> Jewellery</h2>

 <div class="row"> 

     <!-- statustic-card start --> 
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-yellow text-white"> 
             <div class="card-block"> 
                         <a href="{{route('stock.create')}}"> 
                 <div class="row align-items-center"> 
                     <div class="col"> 
                         <h5 class="m-b-0">Add Stock</h5>  
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                         </a>
             </div> 
         </div> 
     </div> 
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-green text-white"> 
         <div class="card-block"> 
                         <a href="{{route('stock.index')}}"> 
                 <div class="row align-items-center"> 
                     <div class="col"> 
                         <h5 class="m-b-0">All Stocks</h5> 
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                         </a> 
             </div> 
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-pink text-white"> 
         <div class="card-block"> 
                         <a href="{{route('design.add-design')}}"> 
                 <div class="row align-items-center"> 
                     <div class="col"> 
                         <h5 class="m-b-0">Add Design</h5> 
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                         </a> 
             </div> 
         </div> 
     </div> 
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-blue text-white"> 
         <div class="card-block"> 
                         <a href="{{route('design.index')}}"> 
                 <div class="row align-items-center"> 
                     <div class="col"> 
                         <h5 class="m-b-0">All Designs</h5> 
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                         </a> 
             </div>
         </div> 
     </div> 
 </div> 
 <div class="row"> 

            <!-- statustic-card start -->
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-yellow text-white"> 
         <div class="card-block"> 
                         <a href="{{route('order.create')}}"> 
                 <div class="row align-items-center"> 
                     <div class="col"> 
                         <h5 class="m-b-0">Add Order</h5> 
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                         </a> 
             </div>
         </div> 
     </div> 
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-green text-white"> 
         <div class="card-block"> 
             <div class="row align-items-center"> 
                 <div class="col"> 
                     <h5 class="m-b-0">Order Allocation</h5> 
                 </div> 
                 <div class="col col-auto text-right"> 
                     <i class="fa fa-angle-double-right f-50"></i> 
                 </div> 
             </div> 
             </div> 
         </div> 
     </div>
 </div>
 <div class="row">
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-pink text-white"> 
         <div class="card-block"> 
                         <a href=" ">
                 <div class="row align-items-center"> 
                     <div class="col">  
                         <h5 class="m-b-0">Order Status</h5> 
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                         </a> 
             </div>
         </div> 
     </div> 
     <div class="col-xl-6 col-md-6">
         <div class="card bg-c-blue text-white"> 
         <div class="card-block"> 
                         <a href="{{route('order.receive')}}">
                 <div class="row align-items-center"> 
                     <div class="col"> 
                         <h5 class="m-b-0">Receive Order</h5>
                          
                     </div> 
                     <div class="col col-auto text-right"> 
                         <i class="fa fa-angle-double-right f-50"></i> 
                     </div> 
                 </div> 
                 </a>
             </div> 
         </div> 
     </div> 
 </div> 


@endsection