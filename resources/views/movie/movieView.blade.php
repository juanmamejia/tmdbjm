@extends('app')

@section('content')
<script src="{{ URL::asset('js/jquery.modal.js') }}"></script>
{!! HTML::style ('css/jquery.modal.css') !!}

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Movie Overview</div>

				<div class="panel-body">

					
				      	
						<div class="row">
				            <div class="col-md-5" style="padding-top:20px;">
				                @if($countPosters>0)
				            		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:342px;">
									  <!-- Indicators -->

									  		@if ($countPosters>10)
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
												  	@for ($i=0;$i<count($images['posters']);$i++)
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
									  		@if ($countPosters>10)
											  	@for ($i=0;$i<10;$i++)
											  		@if ($i==0)
													    <div class="item active">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['posters'][$i]['file_path']}}" alt="{{$info['title']}}">
													    </div>
													@else
													    <div class="item">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['posters'][$i]['file_path']}}" alt="{{$info['title']}}">
													    </div>
													@endif
												@endfor
											@else
												@for ($i=0;$i<count($images['posters']);$i++)
											  		@if ($i==0)
													    <div class="item active">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['posters'][$i]['file_path']}}" alt="{{$info['title']}}">
													    </div>
													@else
													    <div class="item">
													      <img src="https://image.tmdb.org/t/p/w342/{{$images['posters'][$i]['file_path']}}" alt="{{$info['title']}}">
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
										<img src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" alt="{{$info['title']}}">
									</div>
								@endif


				            </div>
				           
				            <div class="col-md-7">
				                <h1 style="margin-bottom:0px;">{{$info['title']}} <span style="font-size:16px;padding-bottom:4px;">({{ substr($info['release_date'],0,4) }})</span></h1>
				                <span style="font-size:12px;"><i>{{$info['tagline']}}</i></span>
				                <p style="text-align:justify;margin-top:5px;">{{$info['overview']}}</p>
				                <table class="table table-condensed">
								    
								    <tbody>
								    	@if (!empty($info['vote_average']))
									      <tr>
									        <td style="width:20%;">Raiting</td>
									        <td>{{$info['vote_average']}}/10</td>
									      </tr>
									    @endif
									    @if (!empty($info['vote_count']))
									      <tr>
									        <td>Votes</td>
									        <td>{{$info['vote_count']}}</td>
									      </tr>
									    @endif
									    @if (!empty($info['runtime']))
									      <tr>
									        <td>Runtime</td>
									        <td>{{$info['runtime']}} M.</td>
									      </tr>
									    @endif
									    @if (count($info['genres'])>0)
									      <tr>
									        <td>Genres</td>
									        <td>
									        	@for ($i=0;$i<count($info['genres']);$i++)
									        		{{$info['genres'][$i]['name']}}
									        		@if($i<(count($info['genres'])-1))
									        			,&nbsp;
									        		@endif
									        	@endfor
									        </td>
									      </tr>
									    @endif
									    @if (count($info['production_companies'])>0)
									      <tr>
									        <td>Production</td>
									        <td>
									        	@for ($i=0;$i<count($info['production_companies']);$i++)
									        		{{$info['production_companies'][$i]['name']}}
									        		@if($i<(count($info['production_companies'])-1))
									        			,&nbsp;
									        		@endif
									        	@endfor
									        </td>
									      </tr>
									    @endif
								    </tbody>
								</table>
								  @if (!empty($info['imdb_id']))
								  	<p style="text-align:center;"><a class="btn btn-primary btn-lg" target="_blank" href="http://www.imdb.com/title/{{$info['imdb_id']}}">IMDB Profile page</a></p>
								  @endif
				            </div>
				            
				        </div>


					
				</div>
			</div>
		</div>
	</div>
</div>

@if (count($images['backdrops'])>0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Images</div>

				<div class="panel-body" style="text-align:center;">
					<div class="row">
			            @if ($countBackdrops>8)
                            @for ($i=0;$i<8;$i++)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
						            <a href="{{ url("movie/imageajax".$images['backdrops'][$i]['file_path'])}}" class="thumbnail" rel="modal:open">
						                <img id="imageresource" alt="" src="https://image.tmdb.org/t/p/w500/{{$images['backdrops'][$i]['file_path']}}" class="img-responsive">
						            </a>
						        </div>
                            @endfor
                        @else
                            @for ($i=0;$i<count($images['backdrops']);$i++)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
						            <a href="{{ url("movie/imageajax".$images['backdrops'][$i]['file_path'])}}" class="thumbnail" id="pop" rel="modal:open">
						                <img id="imageresource" alt="" src="https://image.tmdb.org/t/p/w500/{{$images['backdrops'][$i]['file_path']}}" class="img-responsive">
						            </a>
						        </div>
                            @endfor
                        @endif
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if (count($credits['cast'])>0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Cast</div>

				<div class="panel-body">
					<div class="row">
							@for($i=0;$i<$castPreviewCount;$i++)
								<div class="col-md-2">		
								    <p style="text-align:center"><a href="{{ url("person/".$credits['cast'][$i]['id'])}}">@if (!empty($credits['cast'][$i]['profile_path']))<img src="https://image.tmdb.org/t/p/w92{{$credits['cast'][$i]['profile_path']}}" @else <img width="92" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" @endif alt="{{$credits['cast'][$i]['name']}}"  width="92" height="138"></a></p>
								    <p style="text-align:center"><a href="{{ url("person/".$credits['cast'][$i]['id'])}}">{{$credits['cast'][$i]['name']}}</a></p>
								    <p style="text-align:center;font-size:10px;">(as {{$credits['cast'][$i]['character']}})</p>
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
										@if (!empty($credits['cast'][$i]['profile_path']))
												<td style="width:70px;"><a href="{{ url("person/".$credits['cast'][$i]['id']) }}"><img src="https://image.tmdb.org/t/p/w45/{{$credits['cast'][$i]['profile_path']}}" ></a></td>
										@else
												<td style="width:70px;"><a href="{{ url("person/".$credits['cast'][$i]['id']) }}"><img width="45" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
										@endif

									    	<td style="vertical-align:middle;"><a href="{{ url("person/".$credits['cast'][$i]['id']) }}" style="font-size:22px;">{{$credits['cast'][$i]['name']}}</a>@if(!empty($credits['cast'][$i]['character'])) as {{$credits['cast'][$i]['character']}}@endif</td>
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
				<div class="panel-heading" style="text-align:center;">Production/Crew</div>

				<div class="panel-body">
					<div class="row">
							@for($i=0;$i<$crewPreviewCount;$i++)
								<div class="col-md-2">		
								    <p style="text-align:center"><a href="{{ url("person/".$credits['crew'][$i]['id'])}}">@if (!empty($credits['crew'][$i]['profile_path']))<img src="https://image.tmdb.org/t/p/w92{{$credits['crew'][$i]['profile_path']}}" @else <img width="92" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" @endif alt="{{$credits['crew'][$i]['name']}}"  width="92" height="138"></a></p>
								    <p style="text-align:center"><a href="{{ url("person/".$credits['crew'][$i]['id'])}}">{{$credits['crew'][$i]['name']}}</a></p>
								    <p style="text-align:center;font-size:10px;">({{$credits['crew'][$i]['job']}})</p>
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
										@if (!empty($credits['crew'][$i]['profile_path']))
												<td style="width:70px;"><a href="{{ url("person/".$credits['crew'][$i]['id']) }}"><img src="https://image.tmdb.org/t/p/w45/{{$credits['crew'][$i]['profile_path']}}" ></a></td>
										@else
												<td style="width:70px;"><a href="{{ url("person/".$credits['crew'][$i]['id']) }}"><img width="45" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
										@endif

									    	<td style="vertical-align:middle;"><a href="{{ url("person/".$credits['crew'][$i]['id']) }}" style="font-size:22px;">{{$credits['crew'][$i]['name']}}</a>@if(!empty($credits['crew'][$i]['job'])) {{$credits['crew'][$i]['job']}}@endif</td>
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