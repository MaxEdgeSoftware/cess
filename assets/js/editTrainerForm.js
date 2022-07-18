$(document).ready(function() {
    $('#submitTrainerEdit').click(function(e){
        //let trainer = $('#trainerForm').serialize();
        let myFormEdit = $('#trainerFormEdit')[0];
        let trainer = new FormData(myFormEdit);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "editTrainerForm.php",
            data: trainer,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data){
                let submitInfo = jQuery.parseJSON(data);
                console.log(data);
                $('#successMessage').append(
                  `
                    <div class='alert alert-info alert-dismissible'>
                    <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                    ${submitInfo[0]}
                  </div>
                    `
                )
    
            }
        })
        e.preventDefault();
        })   
        
    })