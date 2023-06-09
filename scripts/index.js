$(document).on('click','#adds',function(){
    var date = $('#taskdate').val()
    var task = $('#task').val()

    
    $.ajax({
        url: 'process/todoprocess.php',
        method: 'POST',
        data:{date,task},
        success: function(response) {
            $('#taskdate').val("")
            $('#task').val("")
            if(response == 1){
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Task Added',
                showConfirmButton: false,
                timer: 1000
                }).then(()=>{
                    $('#error').text("")
                    $('#todobody').load('index.php #todoreload')
                })
            }else{
            $('#error').text(response)
            }
        }
    })
})


$(document).on('click','#delete',function(){

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('data')
            $.ajax({
                url: 'process/tododelete.php',
                method: 'POST',
                data:{id},
                success: function(response) {
                    if(response == 1){
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Task Deleted',
                        showConfirmButton: false,
                        timer: 1000
                        }).then(()=>{
                            $('#error').text("")
                            $('#todobody').load('index.php #todoreload')
                        })
                    }else{
                    $('#error').text(response)
                    }
                }
            })
        }
      })
    
})
$(document).on('click','#complete',function(){

    Swal.fire({
        title: 'Mark this task complete?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Done it!'
      }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('data')
            $.ajax({
                url: 'process/todocomplete.php',
                method: 'POST',
                data:{id},
                success: function(response) {
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Task Completed',
                        showConfirmButton: false,
                        timer: 1000
                        }).then(()=>{
                            $('#error').text("")
                            $('#todobody').load('index.php #todoreload')
                        })
                }
            })
        }
      })
    
})


$(document).on('click','.editlist',function(){
    $(this).closest('.row').find('#todoname').removeAttr('readonly').removeAttr('disabled').focus()
    $(this).closest('.row').find('#editicon').removeClass('fa fa-pencil').addClass('fa fa-save')
    $(this).removeClass('editlist').addClass('updatelist')
})

$(document).on('click','.updatelist',function(){
    var id = $(this).attr('data')
    var todoname = $(this).closest('.row').find('#todoname').val()
    $.ajax({
        url: 'process/todoupdate.php',
        method:'POST',
        data:{id:id,name:todoname},
        success:function(response){
            if(response == '1'){
                $(this).closest('.row').find('#todoname').attr('readonly', true).attr('disabled', true);
                $(this).closest('.row').find('#editicon').removeClass('fa fa-save').addClass('fa fa-pencil')
                $(this).removeClass('updatelist').addClass('editlist')
                $('#todobody').load('index.php #todoreload')
            }else{
                Swal.fire({
                    title: response,
                    icon: 'warning'
                  })
            }
        }
    })


})


