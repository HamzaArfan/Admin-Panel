$(document).ready(function(){
    $('#adduserform').submit(function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'add_user.php',
            data: $(this).serialize(),
            success: function(response){
                window.location.href = "users.php";
            },
            error: function(){
                window.location.href = "users.php";
            }
        });
    });
});
