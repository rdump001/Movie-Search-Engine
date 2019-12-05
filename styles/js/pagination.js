$(document).on('click','.searchresult', function(e){ 

    var page=$(this).text();
    var title = e.currentTarget.id;
    
    $.ajax({
        async:false,
        url:'paginationresult.php',
        type: 'get',
        data:{ 'movie_details':{'page_num':page, 'movie_title':title}},
        dataType: 'text',
        success: function(data){

            $('.initial').hide();
            $(".page").html(data);
        }
    
    
    });


})


$(document).on('click','.searchresult1', function(e){ 

    var page=$(this).text();
    var title = e.currentTarget.id;
    
    $.ajax({
        async:false,
        url:'paginationresult1.php',
        type: 'get',
        data:{ 'movie_details':{'page_num':page, 'movie_title':title}},
        dataType: 'text',
        success: function(data){

            $('.initial').hide();
            $(".page").html(data);
        }
    
    
    });


})


