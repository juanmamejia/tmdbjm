@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Most popular movies</div>

				<div class="panel-body">

					<div class="container" >
				      	@for($i=0;$i<count($popularMovies);$i++)
				      		@if ($i == 0 || $i % 3 == 0)
				      			<div class="row">
				      		@endif
					      
						        <div class="col-md-3">
						          <h3>{{$popularMovies[$i]['title']}}</h3>
						          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
						        </div>
						    
						    @if ($i>0) 
							    @if (($i+1) % 3 == 0 || ($i+1) == count($popularMovies) )
					      			</div>
					      		@endif
					      	@endif
					      
					    @endfor
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
