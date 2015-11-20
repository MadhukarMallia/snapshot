Dropzone.options.addImages = {
	maxFilesize: 2,
	acceptedFiles: 'image/*',
	success: function(file, response) {
		if(file.status === 'success') {
			handleDropzoneFileUpload.handleSuccess(response);
		} else {
			handleDropzoneFileUpload.handleError(response);
		}
	}
};

var handleDropzoneFileUpload = {
	handleError: function (response) {

	},
	handleSuccess: function (response) {
		var imageList = $('#gallery-images ul');
		var imageSrc = baseUrl + '/' + response.thumb_file_path;
		$(imageList).append('<li><a href="' + imageSrc + '"><img src="' + imageSrc + '"/></a></li>');
	}
};

$(document).ready(function () {
	console.log('document ready');
});