/*upload*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            console.log("input",input);
            var imagePreviewid = $('.imgUpload[data-id='+$(input).attr("data-id")+']');
            console.log("lll", $('.imgUpload[data-id='+$(input).attr("data-id")+']'));
            imagePreviewid.css('background-image', 'url('+e.target.result +')');
            imagePreviewid.hide();
            imagePreviewid.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("input[name^='newportimage']").on("change",function() {
    readURL(this);
});

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagePreviewid = $('#imagePreview');
            imagePreviewid.css('background-image', 'url('+e.target.result +')');
            imagePreviewid.hide();
            imagePreviewid.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("input[name='upuserpic']").on("change",function() {
    readURL2(this);
});


/*click plus btn*/
$(document).ready(function(){
    $('#click-addimages').click(function() {
        $('#addimages-modal').appendTo("body").modal('show');
    });
});

/*add 3 new images row*/
