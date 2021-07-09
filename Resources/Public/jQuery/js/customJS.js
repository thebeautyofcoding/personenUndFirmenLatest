// hide elements that don't contain the search keyword
$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      
        $("#tr").filter(function() {
         
          
   
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  
          
        });
        if($("#tr").text().toLowerCase().indexOf(value)===-1){
            $('.btn-danger').hide()
            $('.pagination').hide()
      
      
        }else{
            $('.btn-danger').show()
            $('.pagination').show()
        }
    });


    // Disable CreateNew-Button, if no Company was chosen
        $('#submit').prop('disabled', true)
        $('#select').on('change', function(){
            if($('#select').val()!==''){
                $('#submit').prop('disabled', false)
            }else{
                $('#submit').prop('disabled', true)
            }
         })
  
   




    $(this).on('click','#pageButton,  #nextButton, #previousButton', function () {

        var currentPageNumber = $(this).val();

        var controllerpath = $("#uri_hidden").val();
        var ajaxPageLimit = $('#ajaxPageLimit').val()
        console.log(currentPageNumber, ajaxPageLimit)
        $.ajax({
            type: "POST",
            url: controllerpath,
            data: { 'pageNumber': currentPageNumber, 'ajaxPageLimit': ajaxPageLimit },
            success: function (response) {
                $('[id=tr]').each(function () {
                    $(this).remove()
                    })
              
              


                $('#defaultLimit').val(ajaxPageLimit)
                $('#defaultLimit').text(ajaxPageLimit)
                var tableRows = $(response).find('#tr')
                $('#trHeader').after(tableRows)
                console.log(tableRows)
                  $('#paginationContainer').remove()
           
                var pagination = $(response).find('#paginationContainer')
                $('#table').after(pagination)

            }
        })
    })

    $('#ajaxPageLimit').change(function(){
        
        var val = $('#ajaxPageLimit').val();
      
        const pageNumber= $('.page-item.disabled').find('#pageButton').val()
      
        var controllerpath = $("#uri_hidden").val();

        $.ajax({
            type:"POST",
            url: controllerpath,
            data:{'ajaxPageLimit':val, 'pageNumber':1},
            success:function(response) {
                $('[id=tr]').each(function(){
                $(this).remove()
              
                }
                )
                $('.pagination').remove()
             
                var pagination=$(response).find('#paginationContainer')
                $('#table').after(pagination)

            
                    $('#defaultLimit').val(val)
                    $('#defaultLimit').text(val)

                  
        
         
                  
               
                    var tableRows=$(response).find('#tr')
                    $('#trHeader').after(tableRows)
            
            }
        }) 
    }) 
})