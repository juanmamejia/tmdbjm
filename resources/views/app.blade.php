<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@if (isset($title))
		<title>{{$title}}</title>
	@else
		<title>TMDB Web Application by Juan Manuel Mejía</title>
	@endif
	

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<link href="http://code.jquery.com/ui/1.10.4/themes/cupertino/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">themoviedb.org</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
						<li>
							 
							  <a href="#"  data-toggle="dropdown">Settings</a>
							  <ul class="dropdown-menu" style="width:250px;padding:5px;">
							    <li>
							    	@if(!isset($_COOKIE['adult']))
										<input id="adultSetting" type="checkbox" name="adultSetting" > Include adult titles on my results
									@else
										<input id="adultSetting" type="checkbox" name="adultSetting" @if($_COOKIE['adult']=='true') checked @endif > Include adult titles on my results
									@endif
							    	
							    </li>
							  </ul>
							
						</li>

				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align:center;">
						<form id="queryForm" name="queryForm" action="{{url("search/")}}" method="get" >
							@if (isset($searchedString))
								<input id="queryBox" name="term" maxlength="512" placeholder="Find Movies, TV Shows or Actor's Name" type="text" style="width:60%;" value="{{$searchedString}}" >
							@else
								<input id="queryBox" name="term" maxlength="512" placeholder="Find Movies, TV Shows or Actor's Name" type="text" style="width:60%;" >
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	@yield('content')

	
	<script>
		(function($){
	  
		  var $queryBox = $('#queryBox');
		  
		  $queryBox.autocomplete({
		    minLength: 1,
		    source: "{{ url('/getdata') }}"
		  });
		  
		  $queryBox.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		    
		    var $li = $('<li style="height:70px;border-top:0px;padding:0px;">');

		    var $myul = ul;

		    $myul.css({"margin":"0px", "border":"0px", "padding":"0px"});

		    $li.attr('data-value', item.label);
		    $li.append('<a href="'+item.link+'">');


		    var $theHTML = '<div style="display:table;border:0px;margin:0px;padding:0px;"><span style="vertical-align:middle;display:table-cell;"><img style="vertical-align:middle;display:table-cell;" width="45" height="64" src="'+item.icon+'" alt="'+item.label+'" /></span><span style="vertical-align:middle;display:table-cell;font-size:12px;">&nbsp;<b>'+item.label+'</b><br>&nbsp;'+item.type+'<br>&nbsp;'+item.extra+'</span></div>'; 

		    $li.find('a').append($theHTML); 


		    return $li.appendTo($myul);
		  };
		  

		})(jQuery);

		$('#queryForm').submit(function(e) {
                if( $('#queryBox').val().length === 0 ) 
                {
        			e.preventDefault();
    			}
            });

		$('#adultSetting').click(function() {

			var adult='false';

			if($('#adultSetting').prop('checked')) 
			{
			    adult='true';
			} 

			$.get('{{ url("user/setAdultOption")}}',{option:adult}, function(data){
				//success data		            
			});
		});
	</script>
</body>
</html>
