$(document).ready(function() {
   
    $('#contact').click(function(){
        $.ajax({
            url: "loadContact.php",
            type: 'post',
            async: false,
            success: function(data){
                let contact = jQuery.parseJSON(data);
                if(contact[0] != 'No contact found'){
                $('#displayInfo').find('li').remove().end();
                $('#displayInfo').find('button').remove().end();
                for(let i = 0; i<contact.length; i++){
                    $('#displayInfo').append(`
                    <li class='remove${contact[i].id}' data-aos="fade-up" data-aos-delay="100">
                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-${contact[i].id}"><span>${contact[i].id}</span> ${contact[i].name} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-${contact[i].id}" class="collapse show" data-bs-parent=".accordion-list">
                    <p><strong>Email: </strong>${contact[i].email} </p>
                    <p><strong>Message: </strong>${contact[i].message} </p>
                    <a id="${contact[i].id}" class='removeContact' href='#'><i class="ri-close-line"></i></a>
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