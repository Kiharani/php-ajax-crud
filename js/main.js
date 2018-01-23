$(document).ready(function(){
	$('.reset').on('click', function(){
		$('#user-form')[0].reset();
		$('.modal-title').text("Add User");
	  $('#action').val("Add");
	  $('#operation').val("Add");
	  $('#u_uploaded_img').html('');
	  $('#avatar').text('Add Image');
	});

	 var dataTable = $('#user-data').DataTable({
	  "processing":true,
	  "serverSide":true,
	  "order":[],
	  "ajax":{
	   url:"fetch.php",
	   type:"POST"
	  },
	  "columnDefs":[
	   {
	    "targets":[0, 3, 4],
	    "orderable":false,
	   },
	  ],
  });

  $(document).on('submit', '#user-form', function(e){
  	e.preventDefault();
  	var fname = $('#fname').val();
  	var lname = $('#lname').val();
  	var ext = $('#uimg').val().split('.').pop().toLowerCase();
  	if(ext != ''){
  		if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
  			$('#errors').html('Invalid image file format!');
  			$('#uimg').val();
  			return false;
  		}
  	}
  	if(fname == ''){
  		$('#errors').html('Please fill in the first name!');
  		return false;
  	}
  	if(lname == ''){
  		$('#errors').html('Please fill in the last name!');
  		return false;
  	}

  	$.ajax({
  		url: 'insert.php',
  		method: 'POST',
  		data: new FormData(this),
  		contentType: false,
  		processData: false,
  		success: function(res){
  			$('#success').html(res);
  			$('#errors').html('');
  			$('#user-form')[0].reset();
  			$('#userModal').modal('hide');
  			dataTable.ajax.reload();
  		}
  	});
  });

  $(document).on('click', '.update', function(){
  	var uid = $(this).attr("id");
  	$.ajax({
  		url: 'fetch_single.php',
  		method: 'POST',
  		data: {uid:uid},
  		dataType: 'json',
  		success: function(res){
  			$('#userModal').modal('show');
  			$('#fname').val(res.fname);
  			$('#lname').val(res.lname);
  			$('.modal-title').text('Edit User');
  			$('#uid').val(uid);
  			$('#u_uploaded_img').html(res.uimg);
  			$('#action').val('Update');
  			$('#operation').val('Edit');
  			$('#avatar').text('Update Image');
  		}
  	});
  });

  $(document).on('click', '.delete', function(){
  	var uid = $(this).attr("id");
  	var confm = confirm('Are you sure you want to delete this user parmanently?');

  	if(confm){
	  	$.ajax({
	  		url: 'delete.php',
	  		method: 'POST',
	  		data: {uid:uid},
	  		success: function(res){
	  			$('#success').html(res);
	  			dataTable.ajax.reload();
	  		}
	  	});
  	}else{
  		return false;
  	}
  });

});