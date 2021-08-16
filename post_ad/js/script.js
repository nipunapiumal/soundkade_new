var abc = 0;      // Declaring and defining global increment variable.
var aka = 0; // this is used by akalanka to limit the images
$(document).ready(function () {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
    $('#add_more').click(function () {
        if(aka<5){//ADDED BY UDARA, LIMIT MAX 5 IMAGES
        	$(this).before($("<div/>", {
        	    id: 'filediv'
        	}).fadeIn('slow').append($("<input/>", {
        	    name: 'file[]',
        	    type: 'file',
        	    id: 'file'
        	}), $("")));
        }
    });
// Following function will executes on change event of file input to select different file.
    $('body').on('change', '#file', function () {
	if (this.files && this.files[0]) {
	    abc += 1; // Incrementing global variable by 1.
        aka += 1;
	    var z = abc - 1;
	    var x = $(this).parent().find('#previewimg' + z).remove();
	    $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
	    var reader = new FileReader();
	    reader.onload = imageIsLoaded;
	    reader.readAsDataURL(this.files[0]);
	    $(this).hide();
	    $("#abcd" + abc).append($("<img/>", {
		id: 'img',
		src: '../post_ad/x.png',
		alt: 'delete'
	    }).click(function () {
    		$(this).parent().parent().remove();
            aka -= 1; //ADDED BY UDARA, WHEN USER DELETE A PHOTO  THEY SHOULD BE ABLE TO ADD A NEW PHOTO
	    }));
	}
    });
// To Preview Image
    function imageIsLoaded(e) {
	$('#previewimg' + abc).attr('src', e.target.result);
    }
    ;
});