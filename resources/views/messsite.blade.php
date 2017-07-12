@extends('layouts.app')

@section('content')
 
<head>
<meta charset="utf-8">
  <title>jQuery UI Sortable</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <style>
  .sortable { list-style-type: none; margin: 4px; padding: 3px;width:100px; }
  .sortable li { margin:10px;  padding: 0.8em; padding-left: 1.0em; font-size: 1.2em;  }
  </style>
  <script>
 $(function() {
    $('.sortable').sortable({
        start: function(event, ui) {
            var start_pos = ui.item.index();
            ui.item.data('start_pos', start_pos);
        },
        change: function(event, ui) {
            var start_pos = ui.item.data('start_pos');
            var index = ui.placeholder.index();
            if (start_pos < index) {
                $('.sortable li:nth-child(' + index + ')').addClass('highlights');
            } else {
                $('.sortable li:eq(' + (index + 1) + ')').addClass('highlights');
				//var x = $(this).sortable("serialize");
			//	alert(x);
			/*	$.ajax({
		type: "POST",
		url: "task1_list_page.php",
			data:{data:x},
			dataType: "html",
		success: function(response) {
		  $("#sortable").html(response);	
            }
        }
		);*/
		
			}
			},
        update: function(event, ui) {
            $('.sortable li').removeClass('highlights');
        },
		stop: function(event, ui) {
        var data = "";

        $(".sortable li.ui-state-default").each(function(i, el){
            var p = $(el).text().toLowerCase().replace(" ", "_");
            data += p+"="+$(el).index()+",";
        });

        $("form > [name='new_order']").val(data.slice(0, -1));
        //$("form").submit();
    }
    });
   
  });
  </script>
</head> 
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welocme {{ Auth::user()->name }}</div>

                <div class="panel-body">					
				<ul class="sortable">					
					@foreach($mess as $m)												
							<li class='ui-state-default'>{{ $m->id }}</li>																	
						@endforeach	
				</ul>
                </div>
            </div>
        </div>
    </div>
</div>


<form action="jquery_sortable.php" method="POST" >
<input name="new_order" value="" type="hidden" > </input>
<input type="submit" id="submit" value="submit"></input>
</form>
</body>
@endsection
