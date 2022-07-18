$(document).ready(function() {
$('#submitContact').click(function(e){
    let contact = $('#contactForm').serialize();
    $.ajax({
        url: "submitContactForm.php",
        data: contact,
        type: 'post',
        async: false,
        success: function(data){
            let submitInfo = jQuery.parseJSON(data);
            console.log(data);
            $('.sent-message').append(
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