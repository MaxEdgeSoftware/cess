$(document).ready(function() {
   
   // $('#trainers').ready(function(){
        $.ajax({
            url: "loadTrainers.php",
            type: 'post',
            async: false,
            success: function(data){
                let trainer = jQuery.parseJSON(data);
                if(trainer[0] != 'No result found'){
                $('#displayInfo').find('.col-lg-6').remove().end();
                for(let i = 0; i<trainer.length; i++){
                    $('#displayInfo').append(`
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="member d-flex align-items-start">
                      <div class="pic"><img src="assets/img/trainers/${trainer[i].image}" class="img-fluid" alt=""></div>
                      <div class="member-info">
                        <h4>${trainer[i].name}</h4>
                        <span>${trainer[i].title}</span>
                        <p>${trainer[i].about}</p>
                        <div class="social">
                          <a href="${trainer[i].twitter}"><i class="ri-twitter-fill"></i></a>
                          <a href="${trainer[i].facebook}"><i class="ri-facebook-fill"></i></a>
                          <a href="${trainer[i].instagram}"><i class="ri-instagram-fill"></i></a>
                          <a href="${trainer[i].linkedin}"> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                      </div>
                    </div>
                  </div>
                    `);
                    }
                }else{
                    $('#displayInfo').find('.col-lg-6').remove().end();
                    $('#displayInfo').append(``);
                   
                }
                }
        })
       // })
    })