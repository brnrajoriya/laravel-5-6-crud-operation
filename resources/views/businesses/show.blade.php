@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	All Businesses
                	<a href="{{ route('my-businesses.create') }}">
                		<button type="button" class="btn btn-primary">
                        	{{ __('ADD') }}
                    	</button>
                	</a>
            	</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>{{$business}}</p>
                    <h1>{{$business->name}}</h1>
                    <h4>{{$business->phone}}</h4>
                    <h4>{{$business->email}}</h4>
                    <h4>{{$business->about}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
