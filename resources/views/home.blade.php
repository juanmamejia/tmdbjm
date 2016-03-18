@extends('app')

@section('content')

@if(count($popularMovies)>0)
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align:center;">Most Popular Movies</div>

					<div class="panel-body">

						
					      	@for($i=0;$i<8;$i++)
					      		@if ($i == 0 || $i % 4 == 0)
					      			<div class="row">
					      		@endif
						      
							        <div class="col-md-3">						          
							          <p><a href="movie/{{$popularMovies[$i]['id']}}"><img src="https://image.tmdb.org/t/p/w250_and_h141_bestv2{{$popularMovies[$i]['poster_path']}}" alt="{{$popularMovies[$i]['title']}}" class="img-responsive"></a></p>
							          <p><a href="movie/{{$popularMovies[$i]['id']}}">{{$popularMovies[$i]['title']}}</a></p>
							          <p>&nbsp;</p>
							        </div>
							    
							    @if ($i>0) 
								    @if (($i+1) % 4 == 0 || ($i+1) == 8 )
						      			</div>
						      		@endif
						      	@endif
						      
						    @endfor
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endif

@if(count($popularTvShows)>0)
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align:center;">Most Popular TV Shows</div>

					<div class="panel-body">

						
					      	@for($i=0;$i<8;$i++)
					      		@if ($i == 0 || $i % 4 == 0)
					      			<div class="row">
					      		@endif
						      
							        <div class="col-md-3">						          
							          <p><a href="tv/{{$popularTvShows[$i]['id']}}"><img src="https://image.tmdb.org/t/p/w250_and_h141_bestv2{{$popularTvShows[$i]['poster_path']}}" alt="{{$popularTvShows[$i]['name']}}" class="img-responsive"></a></p>
							          <p><a href="tv/{{$popularTvShows[$i]['id']}}">{{$popularTvShows[$i]['name']}}</a></p>
							          <p>&nbsp;</p>
							        </div>
							    
							    @if ($i>0) 
								    @if (($i+1) % 4 == 0 || ($i+1) == 8 )
						      			</div>
						      		@endif
						      	@endif
						      
						    @endfor
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endif

@if(count($popularPersons)>0)
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align:center;">Most popular Persons</div>

					<div class="panel-body">
					      	@for($i=0;$i<8;$i++)
					      		@if ($i == 0 || $i % 4 == 0)
					      			<div class="row">
					      		@endif
						      
							        <div class="col-md-3">						          
							          <p><a href="person/{{$popularPersons[$i]['id']}}"><img src="https://image.tmdb.org/t/p/w250_and_h141_bestv2{{$popularPersons[$i]['profile_path']}}" alt="{{$popularPersons[$i]['name']}}" class="img-responsive"></a></p>
							          <p><a href="person/{{$popularPersons[$i]['id']}}">{{$popularPersons[$i]['name']}}</a></p>
							          <p>&nbsp;</p>
							        </div>
							    
							    @if ($i>0) 
								    @if (($i+1) % 4 == 0 || ($i+1) == 8 )
						      			</div>
						      		@endif
						      	@endif
						      
						    @endfor
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
<div><p>&nbsp;</p></div>
@endsection
