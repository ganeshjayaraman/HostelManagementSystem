@extends('layouts.app')

@section('content')

 <script>
 $(function() {
    $('#sortable').sortable({		
        start: function(event, ui) {
            var start_pos = ui.item.index();
            ui.item.data('start_pos', start_pos);
        },
        change: function(event, ui) {
            var start_pos = ui.item.data('start_pos');
            var index = ui.placeholder.index();
            if (start_pos < index) {
                $('#sortable li:nth-child(' + index + ')').addClass('highlights');
            } else {
                $('#sortable li:eq(' + (index + 1) + ')').addClass('highlights');
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
            $('#sortable li').removeClass('highlights');
        },
		stop: function(event, ui) {
        var data = "";

        $("#sortable li.ui-state-default").each(function(i, el){
            var p = $(el).text().toLowerCase().replace(" ", "_");
            data += p+"="+$(el).index()+",";
        });

        $("form > [name='new_order']").val(data.slice(0, -1));
        //$("form").submit();
    }
    });
   
  });
  </script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welocme {{ Auth::user()->name }}</div>

                <div class="panel-body">
						
					<ul id='sortable'>
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
@endsection
