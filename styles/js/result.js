$(document).on('click','.save', function(e){ 
    

    var id = e.currentTarget.id;
    $.ajax({
        async:false,
        url:'history.php',
        type: 'get',
        data:{'movie_id':id},
        dataType: 'text',
        success: function(data){

            console.log(data);
        }
    
    
    });


})
