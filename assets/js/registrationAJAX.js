$(document).ready(function() {
   
    $('#registration').click(function(){
        $.ajax({
            url: "loadRegistration.php",
            type: 'post',
            async: false,
            success: function(data){
                let registration = jQuery.parseJSON(data);
                if(registration[0] != 'No result found'){
                $('#displayInfo').find('li').remove().end();
                $('#displayInfo').find('button').remove().end();
                for(let i = 0; i<registration.length; i++){
                    $('#displayInfo').append(`
                    <li class='remove${registration[i].id}' data-aos="fade-up" data-aos-delay="100">
                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-${registration[i].id}"><span>${registration[i].id}</span> ${registration[i].name}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-${registration[i].id}" class="collapse" data-bs-parent=".accordion-list">
                    <p><strong>Email: </strong>${registration[i].email} </p>
                    <p><strong>Message: </strong>${registration[i].address} </p>
                    <p><strong>Phone Number: </strong>${registration[i].phone} </p>
                    <p><strong>Training Category: </strong>${registration[i].training_type} </p>
                    <a id="${registration[i].id}" class='removeRegistration' href='#'><i class="ri-close-line"></i></a>
                    </div>
                  </li>
                
                    `);
                    }
                }else{
                    $('#displayInfo').find('li').remove().end();
                    $('#displayInfo').find('button').remove().end();
                    $('#displayInfo').append(`<li>No information yet</li>`);
                }
                }
        })
        })
    })