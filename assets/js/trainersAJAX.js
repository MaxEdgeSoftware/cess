$(document).ready(function() {
   $('#team').click(function(){
       $.ajax({
           url: "loadTrainers.php",
           type: 'post',
           async: false,
           success: function(data){
               let trainer = jQuery.parseJSON(data);
               if(trainer[0] != 'No result found'){
               $('#displayInfo').find('li').remove().end();
               $('#displayInfo').find('button').remove().end();
               for(let i = 0; i<trainer.length; i++){
                   $('#displayInfo').append(`
                   <li class='remove${trainer[i].id}' data-aos="fade-up" data-aos-delay="100">
                   <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-${trainer[i].id}"><span>${trainer[i].id}</span> ${trainer[i].name}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                   <div id="accordion-list-${trainer[i].id}" class="collapse" data-bs-parent=".accordion-list">
                   <p><strong>Title: </strong>${trainer[i].title} </p>
                   <p><strong>About: </strong>${trainer[i].about} </p>
                   <button class='btn btn-success' data-bs-toggle="modal" data-bs-target="#addTrainer" >add</button>
                   <button class='btn btn-info' data-bs-toggle="modal" data-bs-target="#editTrainer" onclick='editTrainer(${trainer[i].id})'>edit</button>
                   <a id="${trainer[i].id}" class='removeTrainer' href=""><i class="ri-close-line" ></i></a>
                   </div>
                 </li>
                   `);
                   }
               }else{
                   $('#displayInfo').find('li').remove().end();
                   $('#displayInfo').find('button').remove().end();
                   $('#displayInfo').append(`<li>No Trainer Added Yet.</li>`);
                   $('#displayInfo').append(`<button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#addTrainer" >Add Trainer</button>
                   `);

               }
               }
       })
       })  
   })



   function editTrainer(id = null){
    if(id){
     $.ajax({
         url:'fetchTrainer.php',
         type:'post',
         data:{id:id},
         dataType:'json',
         success:function(response){
           console.log(response);
            $('#editName').val(response.name);
            $('#editTitle').val(response.title);
            $('#editAbout').val(response.about);
            $('#editTwitter').val(response.twitter);
            $('#editFacebook').val(response.facebook);
            $('#editInstagram').val(response.instagram);
            $('#editLinkedin').val(response.linkedin);
            $('#editImage').val();
            $('#editId').val(response.id);
         }
     })

    }
 
}
   



  