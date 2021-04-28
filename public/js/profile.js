$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
   if ( uploader.files && uploader.files[0] ){
         $('#profileImage').attr('src',
            window.URL.createObjectURL(uploader.files[0]) );
            document.getElementById('uploadAvatarBtn').style.display = 'inline';
   }
}

$("#imageUpload").change(function(){
   fasterPreview( this );
});
