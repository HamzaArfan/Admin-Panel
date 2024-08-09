function confirmDelete(userId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:'GET',
                url:'delete_user.php',
                data: { id: userId },
                success:function(response){
                    window.location.href='users.php'
                },
                error:function(){
                alert("Sorry Had Some Isssues Deleting The User Try Again")
                }
            })
        }
    })
}
function confirmUpdate(userId){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6' ,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes Update It!'
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            type:'GET',
            url:'php_backend/update_backend.php',
            success:function(){
                window.location.href="update_user.php?id=" + userId;
            },
            error:function(){
                alert("Error");
            }
        })
    }
})
}