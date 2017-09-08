$(document).ready(function(){
	$('.btnDel').on('click',function(){
		var id = $(this).prev();
		var id_value = id.val();
		var	modal = $(this).next();
		var modal_confirm = modal.find('.btnConf');
		var case_name = modal_confirm.data('casetype');
		$(modal_confirm).on('click',function(){
			if(case_name == 'theloai')
				window.location.href='admin/theloai/xoa/'+id_value;
			else if(case_name == 'loaitin')
				window.location.href='admin/loaitin/xoa/'+id_value;
			else if(case_name == 'tintuc')
				window.location.href='admin/tintuc/xoa/'+id_value;
			else if(case_name == 'binhluan')
				window.location.href='admin/comment/xoa/'+id_value;
			else if(case_name == 'slide')
				window.location.href='admin/slide/xoa/'+id_value;
			else if(case_name == 'user')
				window.location.href='admin/user/xoa/'+id_value;
		})
	});

	$('.catefield').on('change',function(){
		var cate_id = $(this).val();

		$.get('admin/ajax/layloaitin/'+cate_id,function(data){
			if(data == '')
				$('.subcatefield').html('<option>Không có dữ liệu..</option>');
			else
				$('.subcatefield').html(data);
		})
	});

	$('input:radio[name="change_password"]').on('change',function(){
		if(this.checked && this.value == 0)
			$('.disabled-field').attr('disabled',true);
		else
			$('.disabled-field').attr('disabled',false);
	});

	setInterval(timestamp,1000);

	function timestamp(){
		$.ajax({
			url: 'admin/ajax/timestamp',
			type: 'GET',
			success:function(data){
				$('#timestamp').html(data);
			}
		});
	}
})
