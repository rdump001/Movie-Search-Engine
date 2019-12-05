$(document).on('click','.delete', function(e){ 

    // e.stopImmediatePropagation();
    // alert("Movie Removed from Favourites");
    var id = e.currentTarget.id;
    $.ajax({
        async:false,
        url:'deletehistory.php',
        type: 'get',
        data:{'movie_id':id},
        dataType: 'text',
        success: function(data){

            location.reload(true);
        }
        
    
    });
    


})