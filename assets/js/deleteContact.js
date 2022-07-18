$(document).ready(function() {

    $('#displayInfo').on('click', '.removeContact', (function(e){
        let id = $(this).attr('id');
        $.ajax({
            url: "deleteContact.php",
            data: {id:id},
            type: 'post',
            async: false,
            success: function(data){
                let deleteInfo = jQuery.parseJSON(data);
                //console.log(data);
                $('#successMessage').append(
                  `
                    <div class='alert alert-info alert-dismissible'>
                    <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                    ${deleteInfo[0]}
                  </div>
                    `
                )
                $('.remove' + id).fadeOut('slow');


            }
        })
        e.preventDefault();
        })
)

})