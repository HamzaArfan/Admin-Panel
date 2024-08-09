$(document).ready(function(){
    $('#updateformsubmit').submit(function(event){
      event.preventDefault();
      $.ajax({
        type:'POST',
        url:'php_backend/update_backend.php',
        data: $(this).serialize(),
        success:function(response){
          window.location.href="users.php";
        },
        error:function(){
          alert("Update User Failed");
        }
      })

    })
  })