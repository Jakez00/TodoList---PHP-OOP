$(document).on('click','#register',function(){

    $.ajax({
        url: 'process/processsignup.php',
        method:'POST',
        data: $('#signup').serialize(),
        success:function(response){
            if(response == 1){
                $('#username').val("")
                $('#pass').val("")
                $('#pass2').val("")
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Account has been Successfully Created',
                    showConfirmButton: true,
                    })
            }else{
                $("#alert").text(response)
            }
        }
    })
})