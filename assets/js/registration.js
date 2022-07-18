$(document).ready(function() {
$('#submitRegister').click(function(e){
    let registration = $('#registerForm').serialize();
    $.ajax({
        url: "submitRegistrationForm.php",
        data: registration,
        type: 'post',
        async: false,
        success: function(data){
            let submitInfo = jQuery.parseJSON(data);
            console.log(data);
            $('.registration-message').append(
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