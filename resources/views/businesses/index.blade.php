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

                    @foreach(Auth::user()->businesses as $business)
                    	<h1>{{$business->name}}</h1>
                    	<a href="{{ route('my-businesses.show', [$business->slug])}}">
	                		<button type="button" class="btn btn-primary">
	                        	{{ __('Show') }}
	                    	</button>
                		</a>
                    	<a href="{{ route('my-businesses.edit', [$business->slug])}}">
	                		<button type="button" class="btn btn-primary">
	                        	{{ __('Edit') }}
	                    	</button>
                		</a>
                		<form method="POST" action="{{ route('my-businesses.destroy', [$business->slug])}}">
                           {{ method_field('DELETE') }}
                           @csrf
                           <button class="btn bg-pink waves-effect" type="submit">
                               <i class="material-icons">{{ __('Delete') }}</i>
                           </button>
                       </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
