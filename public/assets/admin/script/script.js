$(function(){
	$('.dm').hover(function(){
		$('.dm').css('background-color', '#f8f9fa');
	}, function(){
		$('.dm').css('background-color', 'white');
	});
	$('.sp').hover(function(){
		$('.sp').css('background-color', '#f8f9fa');
	}, function(){
		$('.sp').css('background-color', 'white');
	});
	$('.dh').hover(function(){
		$('.dh').css('background-color', '#f8f9fa');
	}, function(){
		$('.dh').css('background-color', 'white');
	});
	$('.acc').hover(function(){
		$('.acc').css('background-color', '#f8f9fa');
	}, function(){
		$('.acc').css('background-color', 'white');
	});
});
$("#show_hide_sidebar").on('click', function(){
	$('.left').toggle(3000);
});
$(document).on('click','.btn-delete', function(){
	$(this).closest('tr').remove();
});
$(document).on('click','.btn-primary', function handleDelete(){
	$(this).closest('tr').remove();
});
$(document).on('click','.btn-edit', function(){
	$(this).closest('tr').find('input[name="sl"]').attr('disabled', false);
});
$('.btn-add').on('click', function(){
	var count=0;
	$('.input-sl').each(function(){
		count++;
	})
	$('tbody').add('<tr>'+
							'<td>'+ (count+1)+'</td>'+
							'<td>Sữa tắm trắng da</td>'+
							'<td>Sữa tắm</td>'+
							'<td>100.00 VND</td>'+
							'<td><input type="number" name="" value="1" class="form-control input-sl"></td>'+
							'<td>'+
								'<button type="button" class="btn btn-success btn-edit">Sửa</button>'+
								'<button type="button" class="btn btn-danger btn-delete">Xóa</button>'+
							'</td>'+
						'</tr>'
						);
});


$('.btn-primary').on('click', function(){
	var value = $("input[name= 'category_name']").val();
	console.log(value);
	var count = 0;
	$('category_name').each(function(){
		count ++;
	})
	$('tbody').append('<tr>'
                                        +'<td></td>'+
                                        '<td> dyverec </td>'+
                                        '<td>01-Aug-21 7:52:46 PM</td>'+
                                        '<td class="text-right">'+
                                            '<a href="category.html/Update?id=1" class="btn btn-sm bg-success-light mr-2">'+
                     
                                                '<i class="far fa-edit mr-1"></i> Sửa'+
                                            '</a>'+
                                            '<a data-id="40"  href="javascript:void(0);"' +
                                               'href="javascript:void(0);"'+
                                               'class="btn btn-sm bg-danger-light mr-2 delete_review_comment "'+
                                               'data-toggle="modal" data-target="#model-1">'+
                                                '<i class="far fa-trash-alt mr-1"></i> Xoá'+
                                            '</a>'+
                                        '</td>'+
                                    '</tr>)'
                                   );
});