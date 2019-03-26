@extends('layouts.master')

@section('content')

<div class="page-wrapper">
	<div class="card">
	    <div class="card-header">
	        <h5>Hover Table</h5>
	        <span>use class <code>table-hover</code> inside table element</span>

	    </div>
	    <div class="card-block table-border-style">
	        <div class="table-responsive">
	            <table class="table table-hover">
	                <thead>
	                    <tr>
	                        <th style="max-width: 30px;" class="text-right">Design no.#</th>
	                        <th>Picture</th>
	                        <th>Price</th>
	                        <th>Avg Unit Price</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($designs as $design)
	                    	<tr>
		                        <th scope="row" style="max-width: 30px;" class="text-right">{{$design->design_no}}</th>
		                        <td>
		                        	<div style="width: 60px; height: 60px">
		                        		<a href="{{route('design.show', ['design' => $design->design_no])}}">
		                        			<img src="{{asset($design->picture)}}" alt="Design" style="width: 100%; border-radius: 5px; overflow: hidden;">
		                        		</a>
		                        	</div>
		                        </td>
		                        <td></td>
		                        <td></td>
		                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>	
</div>

@endsection