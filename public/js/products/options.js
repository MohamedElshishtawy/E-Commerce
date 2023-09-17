$(document).ready(function () {


    let colorCount = 0,
        sizeCount = 0;

    
    $(document).on("click", "#colors", function () { 
        
        if( $("#colors").prop("checked") ) {
            
            $("[name=count]").val(null).slideUp(500)

            $("[for=count]").slideUp(500)

            $(".table-color").slideDown(500)

        }

        else{

            $(".table-color").slideUp(500)

            $("[name=count]").slideDown(500)

            $("[for=count]").slideDown(500)

            while( colorCount ){

                $("#color"+colorCount--).remove()

            }

        }

        $(document).on("click", "#addColor", function() {
            colorCount++
            let elemet = "<tr id='color"+colorCount+"'> <td><input type='color' name='color"+colorCount+"' /></td> <td><input type='number' class='count' name='color_count_"+colorCount+"'></td> </tr>"
            
            $(".table-color tbody").prepend(elemet)
            
        })
        
        $(document).on("click", "#removeColor", function(){
            if ( colorCount ){
                
                $("#color"+colorCount--).remove()
            }
        })
        
    });



    $(document).on("click", "#sizes", function () { 
        
        if( $("#sizes").prop("checked") ) {
            
            $("[name=count]").val(null).slideUp(500)

            $("[for=count]").slideUp(500)

            $(".table-size").slideDown(500)

        }

        else{

            $(".table-size").slideUp(500)

            $("[name=count]").slideDown(500)

            $("[for=count]").slideDown(500)

            while( sizeCount ){

                $("#size"+sizeCount--).remove()

            }

        }

        $(document).on("click", "#addSize", function() {
            sizeCount++
            let elemet = "<tr id='size"+sizeCount+"'> <td><input type='text' class='size' name='size"+sizeCount+"' /></td> <td><input type='number' class='count' name='size_count_"+sizeCount+"'></td> </tr>"
            
            $(".table-size tbody").prepend(elemet)
            
        })
        
        $(document).on("click", "#removeSize", function(){
            if ( sizeCount ){
                
                $("#size"+sizeCount--).remove()
            }
        })
        
    });

});