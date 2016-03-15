<!DOCTYPE html>
<html>
<head>
<link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
</head>
<body>
  <div id="project-label">Select a project (type "j" for a start):</div>
  <input id="project">
</body>
</html>
<script>
	(function($){
  
  var $project = $('#project');
  
  $project.autocomplete({
    minLength: 1,
    source: "getdata"
  });
  
  $project.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    
    var $li = $('<li>'),
        $img = $('<img width="45" height="64">');


    $img.attr({
      src: item.icon,
      alt: item.label
    });

    $li.attr('data-value', item.label);
    $li.append('<a href="#">');
    $li.find('a').append($img).append(item.label);    

    return $li.appendTo(ul);
  };
  

})(jQuery);
</script>