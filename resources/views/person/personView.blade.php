@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				

				<div class="panel-body">

					<div class="container" >
				      	
						<div class="row">
				            <div class="col-md-4">
				                
				            		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:342px;">
									  <!-- Indicators -->
									  	
										  <ol class="carousel-indicators">
										  	@for ($i=0;$i<count($images['profiles']);$i++)
										  		@if ($i==0)
												    <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
												@else
												    <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
												@endif
										    @endfor
										  </ol>
										

									  <!-- Wrapper for slides -->
									  <div class="carousel-inner" role="listbox" >
									  	@for ($i=0;$i<count($images['profiles']);$i++)
									  		@if ($i==0)
											    <div class="item active">
											      <img src="https://image.tmdb.org/t/p/w342/{{$images['profiles'][$i]['file_path']}}" alt="Chania">
											    </div>
											@else
											    <div class="item">
											      <img src="https://image.tmdb.org/t/p/w342/{{$images['profiles'][$i]['file_path']}}" alt="Chania">
											    </div>
											@endif
										@endfor
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



				            </div>
				            
				            <div class="col-md-5">
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
								  	<a class="btn btn-primary btn-lg" target="_blank" href="http://www.imdb.com/name/{{$info['imdb_id']}}">IMDB Profile page</a>
								  @endif
				            </div>
				            
				        </div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
