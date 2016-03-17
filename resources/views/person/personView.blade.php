@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Biography</div>

				<div class="panel-body">

					
				      	
						<div class="row">
				            <div class="col-md-5" style="padding-top:20px;">
				                @if($countImages>0)
				            		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:342px;">
									  <!-- Indicators -->

									  		@if ($countImages>10)
									  			<ol class="carousel-indicators">
												  	@for ($i=0;$i<10;$i++)
												  		@if ($i==0)
														    <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
														@else
														    <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
														@endif
												    @endfor
												</ol>
									  		@else
									  			<ol class="carousel-indicators">
												  	@for ($i=0;$i<count($images['profiles']);$i++)
												  		@if ($i==0)
														    <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
														@else
														    <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
														@endif
												    @endfor
												</ol>
									  		@endif

									  <!-- Wrapper for slides -->
									  <div class="carousel-inner" role="listbox" >
									  		@if ($countImages>10)
											  	@for ($i=0;$i<10;$i++)
											  		@if ($i==0)
													    <div class="item active">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['profiles'][$i]['file_path']}}" alt="{{$info['name']}}">
													    </div>
													@else
													    <div class="item">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['profiles'][$i]['file_path']}}" alt="{{$info['name']}}">
													    </div>
													@endif
												@endfor
											@else
												@for ($i=0;$i<count($images['profiles']);$i++)
											  		@if ($i==0)
													    <div class="item active">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['profiles'][$i]['file_path']}}" alt="{{$info['name']}}">
													    </div>
													@else
													    <div class="item">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['profiles'][$i]['file_path']}}" alt="{{$info['name']}}">
													    </div>
													@endif
												@endfor
											@endif
									  </div>

									  <!-- Left and right controls -->
									  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									    <span class="sr-only">Previous</span>
									  </a>
									  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									    <span class="sr-only">Next</span>
									  </a>
									</div>
								@else
									<div >
										<img src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" alt="{{$info['name']}}">
									</div>
								@endif


				            </div>
				            
				            <div class="col-md-7">
				                <h1>{{$info['name']}}</h1>
				                <p style="text-align:justify;">{{$info['biography']}}</p>
				                <table class="table table-condensed">
								    
								    <tbody>
								    	@if (!empty($info['place_of_birth']))
									      <tr>
									        <td>Place of Birth</td>
									        <td>{{$info['place_of_birth']}}</td>
									      </tr>
									    @endif
									    @if (!empty($info['birthday']))
									      <tr>
									        <td>Birthday</td>
									        <td>{{$info['birthday']}}</td>
									      </tr>
									    @endif
									     @if (!empty($info['deathday']))
									      <tr>
									        <td>Deathday</td>
									        <td>{{$info['deathday']}}</td>
									      </tr>
									    @endif
								    </tbody>
								</table>
								  @if (!empty($info['imdb_id']))
								  	<p style="text-align:center;"><a class="btn btn-primary btn-lg" target="_blank" href="http://www.imdb.com/name/{{$info['imdb_id']}}">IMDB Profile page</a></p>
								  @endif
				            </div>
				            
				        </div>


					
				</div>
			</div>
		</div>
	</div>
</div>

@if (count($credits['cast'])>0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Acting</div>

				<div class="panel-body">
					<div class="row">
							@for($i=0;$i<$castPreviewCount;$i++)
								<div class="col-md-2">		
								    @if ($credits['cast'][$i]['media_type']=='movie')
										<p style="text-align:center"><a href="{{ url("movie/".$credits['cast'][$i]['id'])}}"><img @if (!empty($credits['cast'][$i]['poster_path'])) src="https://image.tmdb.org/t/p/w92{{$credits['cast'][$i]['poster_path']}}" @else src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" @endif alt="{{$credits['cast'][$i]['title']}}"  width="92"></a></p>
									    <p style="text-align:center"><a  href="{{ url("movie/".$credits['cast'][$i]['id'])}}">{{$credits['cast'][$i]['title']}}</a></p>
									    <p style="text-align:center;font-size:10px;">(as {{$credits['cast'][$i]['character']}})</p>
									@else
										<p style="text-align:center"><a href="{{ url("tv/".$credits['cast'][$i]['id'])}}"><img @if (!empty($credits['cast'][$i]['poster_path'])) src="https://image.tmdb.org/t/p/w92{{$credits['cast'][$i]['poster_path']}}" @else src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" @endif alt="{{$credits['cast'][$i]['name']}}"  width="92"></a></p>
									    <p style="text-align:center"><a  href="{{ url("tv/".$credits['cast'][$i]['id'])}}">{{$credits['cast'][$i]['name']}}</a></p>
									    <p style="text-align:center;font-size:10px;">(as {{$credits['cast'][$i]['character']}})</p>
									@endif

								    <p>&nbsp;</p>
								</div>
						    @endfor
					</div>

					@if (count($credits['cast'])>6)
						<div class="row">
							<div class="col-md-12" style="text-align:center;padding-bottom:20px;"><input type="button" id="buttonMore" class="btn btn-primary btn-lg" value="See More" ></div>
						</div>
					
						<div id="actingFull" class="row" style="display:none;">
						<table class="table table-condensed">
							<tbody>
								@for ($i=0;$i<count($credits['cast']);$i++)
									<tr>
										@if (!empty($credits['cast'][$sortCast[$i]['key']]['poster_path']))
											@if ($credits['cast'][$sortCast[$i]['key']]['media_type']=='movie')
												<td style="width:70px;"><a href="{{ url("movie/".$credits['cast'][$sortCast[$i]['key']]['id']) }}"><img src="https://image.tmdb.org/t/p/w45/{{$credits['cast'][$sortCast[$i]['key']]['poster_path']}}" ></a></td>
											@else
												<td style="width:70px;"><a href="{{ url("tv/".$credits['cast'][$sortCast[$i]['key']]['id']) }}"><img src="https://image.tmdb.org/t/p/w45/{{$credits['cast'][$sortCast[$i]['key']]['poster_path']}}" ></a></td>
											@endif
										@else
											@if ($credits['cast'][$sortCast[$i]['key']]['media_type']=='movie')
												<td style="width:70px;"><a href="{{ url("movie/".$credits['cast'][$sortCast[$i]['key']]['id']) }}"><img width="45" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
											@else
												<td style="width:70px;"><a href="{{ url("tv/".$credits['cast'][$sortCast[$i]['key']]['id']) }}"><img width="45" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
											@endif
										@endif

										@if ($credits['cast'][$sortCast[$i]['key']]['media_type']=='movie')
									    	<td style="width:50px;"><span style="font-size:22px;">{{substr($credits['cast'][$sortCast[$i]['key']]['release_date'], 0, 4)}}</span></td>
									    @else
									    	<td style="width:50px;"><span style="font-size:22px;">{{substr($credits['cast'][$sortCast[$i]['key']]['first_air_date'], 0, 4)}}</span></td>
									    @endif

									    @if ($credits['cast'][$sortCast[$i]['key']]['media_type']=='movie')
									    	<td><a href="{{ url("movie/".$credits['cast'][$sortCast[$i]['key']]['id']) }}" style="font-size:22px;">{{$credits['cast'][$sortCast[$i]['key']]['title']}}</a>@if(!empty($credits['cast'][$sortCast[$i]['key']]['character'])) as {{$credits['cast'][$sortCast[$i]['key']]['character']}}@endif<br>(Movie)</td>
									    @else
									    	<td><a href="{{ url("tv/".$credits['cast'][$sortCast[$i]['key']]['id']) }}" style="font-size:22px;">{{$credits['cast'][$sortCast[$i]['key']]['name']}}</a>@if(!empty($credits['cast'][$sortCast[$i]['key']]['character'])) as {{$credits['cast'][$sortCast[$i]['key']]['character']}}@endif<br>(TV)</td>
									    @endif
									</tr>
								@endfor
							</tbody>
						</table>
						</div>
					@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if (count($credits['crew'])>0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Production / Crew</div>

				<div class="panel-body">
					<div class="row">
							@for($i=0;$i<$crewPreviewCount;$i++)
								<div class="col-md-2">
									@if ($credits['crew'][$i]['media_type']=='movie')
										<p style="text-align:center"><a href="{{ url("movie/".$credits['crew'][$i]['id'])}}"><img @if (!empty($credits['crew'][$i]['poster_path'])) src="https://image.tmdb.org/t/p/w92{{$credits['crew'][$i]['poster_path']}}" @else src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" @endif alt="{{$credits['crew'][$i]['title']}}"  width="92"></a></p>
									    <p style="text-align:center"><a  href="{{ url("movie/".$credits['crew'][$i]['id'])}}">{{$credits['crew'][$i]['title']}}</a></p>
									    <p style="text-align:center;font-size:10px;">({{$credits['crew'][$i]['job']}})</p>
									@else
										<p style="text-align:center"><a href="{{ url("tv/".$credits['crew'][$i]['id'])}}"><img @if (!empty($credits['crew'][$i]['poster_path'])) src="https://image.tmdb.org/t/p/w92{{$credits['crew'][$i]['poster_path']}}" @else src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" @endif alt="{{$credits['crew'][$i]['name']}}"  width="92"></a></p>
									    <p style="text-align:center"><a  href="{{ url("tv/".$credits['crew'][$i]['id'])}}">{{$credits['crew'][$i]['name']}}</a></p>
									    <p style="text-align:center;font-size:10px;">({{$credits['crew'][$i]['job']}})</p>
									@endif
								    <p>&nbsp;</p>
								</div>
						    @endfor
					</div>

					@if (count($credits['crew'])>6)
						<div class="row">
							<div class="col-md-12" style="text-align:center;padding-bottom:20px;"><input type="button" id="buttonCrewMore" class="btn btn-primary btn-lg" value="See More" ></div>

						</div>

					
						<div id="crewFull" class="row" style="display:none;">
						<table class="table table-condensed">
							<tbody>
								@for ($i=0;$i<count($credits['crew']);$i++)
									<tr>
										@if (!empty($credits['crew'][$sortCrew[$i]['key']]['poster_path']))
											@if ($credits['crew'][$sortCrew[$i]['key']]['media_type']=='movie')
												<td style="width:70px;"><a href="{{ url("movie/".$credits['crew'][$sortCrew[$i]['key']]['id']) }}"><img src="https://image.tmdb.org/t/p/w45/{{$credits['crew'][$sortCrew[$i]['key']]['poster_path']}}" ></a></td>
											@else
												<td style="width:70px;"><a href="{{ url("tv/".$credits['crew'][$sortCrew[$i]['key']]['id']) }}"><img src="https://image.tmdb.org/t/p/w45/{{$credits['crew'][$sortCrew[$i]['key']]['poster_path']}}" ></a></td>
											@endif
										@else
											@if ($credits['crew'][$sortCrew[$i]['key']]['media_type']=='movie')
												<td style="width:70px;"><a href="{{ url("movie/".$credits['crew'][$sortCrew[$i]['key']]['id']) }}"><img width="45" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
											@else
												<td style="width:70px;"><a href="{{ url("tv/".$credits['crew'][$sortCrew[$i]['key']]['id']) }}"><img width="45" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
											@endif
										@endif

										@if ($credits['crew'][$sortCrew[$i]['key']]['media_type']=='movie')
									    	<td style="width:50px;"><span style="font-size:22px;">{{substr($credits['crew'][$sortCrew[$i]['key']]['release_date'], 0, 4)}}</span></td>
									    @else
									    	<td style="width:50px;"><span style="font-size:22px;">{{substr($credits['crew'][$sortCrew[$i]['key']]['first_air_date'], 0, 4)}}</span></td>
									    @endif

									    @if ($credits['crew'][$sortCrew[$i]['key']]['media_type']=='movie')
									    	<td><a href="{{ url("movie/".$credits['crew'][$sortCrew[$i]['key']]['id']) }}" style="font-size:22px;">{{$credits['crew'][$sortCrew[$i]['key']]['title']}}</a>@if(!empty($credits['crew'][$sortCrew[$i]['key']]['job'])) {{$credits['crew'][$sortCrew[$i]['key']]['job']}}@endif<br>(Movie)</td>
									    @else
									    	<td><a href="{{ url("tv/".$credits['crew'][$sortCrew[$i]['key']]['id']) }}" style="font-size:22px;">{{$credits['crew'][$sortCrew[$i]['key']]['name']}}</a>@if(!empty($credits['crew'][$sortCrew[$i]['key']]['job'])) {{$credits['crew'][$sortCrew[$i]['key']]['job']}}@endif<br>(TV)</td>
									    @endif
									</tr>
								@endfor
							</tbody>
						</table>
						</div>
					@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endif

<div><p>&nbsp;</p></div>
<script>
$(document).ready(function(){
	$("#buttonMore").click(function(){
    	$("#actingFull").toggle();

    	if ($(this).val() == "See More") 
    	{
		    $(this).val("See Less");
		}
		else 
		{
		    $(this).val("See More");
		}
	});

	$("#buttonCrewMore").click(function(){
    	$("#crewFull").toggle();

    	if ($(this).val() == "See More") 
    	{
		    $(this).val("See Less");
		}
		else 
		{
		    $(this).val("See More");
		}
	});
});
</script>

@endsection
