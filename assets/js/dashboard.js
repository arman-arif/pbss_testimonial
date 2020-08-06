
(function () {

	feather.replace();
  
	var uploadfile = $('#csv_upload');
	uploadfile.on('change', function(){
		var filename = uploadfile.val();
		filename = filename.split("\\");
		filename = filename[filename.length -1];
		
		if(filename !== ''){
			uploadfile.next().attr('title', filename);
			uploadfile.next().addClass('file_name');
		} else {
			uploadfile.next().attr('title', "Choose file...");
			uploadfile.next().addClass('file_name');
		}
		
	});
	

}());
