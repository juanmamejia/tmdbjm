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
						          <p><a href="movie/{{$popularMovies[$i]['id']}}"><img src="https://image.tmdb.org/t/p/w250_and_h141_bestv2{{$popularMovies[$i]['poster_path']}}" alt="{{$popularMovies[$i]['title']}}"></a></p>
						          <h4>{{$popularMovies[$i]['title']}}</h4>
						          <p>&nbsp;</p>
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
