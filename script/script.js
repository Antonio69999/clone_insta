$('#upload_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData($(this)[0]);
    $('#upload_notification').html("Upload in progress");

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,

        cache: false,
        contentType: false,
        processData: false,

        sucess: function (data) {
            $('#upload_notification').html("Upload successful");
        },
        error: function (data) {
            $('#upload_notification').html("Upload failed");
            console.log(data);
        }
    });
});