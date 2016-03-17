<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

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
						<li><a href="{{ url('/auth/login') }}">Movies</a></li>
						<li><a href="{{ url('/auth/register') }}">TV Shows</a></li>
						<li><a href="{{ url('/auth/register') }}">Persons</a></li>
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
							<input id="queryBox" name="term" placeholder="Find Movies, TV Shows or Actor's Name" type="text" style="width:60%;" >
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
		    
		    var $li = $('<li style="height:70px;border-top:0px;">');

		    //$li.parent().css( "margin-top", "0px" );

		    $li.attr('data-value', item.label);
		    $li.append('<a href="'+item.link+'">');


		    var $theHTML = '<div style="display:table;"><span style="vertical-align:middle;display:table-cell;"><img style="vertical-align:middle;display:table-cell;" width="45" height="64" src="'+item.icon+'" alt="'+item.label+'" /></span><span style="vertical-align:middle;display:table-cell;font-size:12px;">&nbsp;<b>'+item.label+'</b><br>&nbsp;'+item.type+'<br>&nbsp;'+item.extra+'</span></div>'; 

		    $li.find('a').append($theHTML); 

		    //ul.css({"border-top":"0px", "margin-top":"0px"});

		    return $li.appendTo(ul);
		  };
		  

		})(jQuery);

		$('#queryForm').submit(function(e) {
				//
                if( $('#queryBox').val().length === 0 ) 
                {
        			e.preventDefault();
    			}
            });
	</script>
</body>
</html>
