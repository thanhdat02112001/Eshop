jQuery(document).ready(function($){
    $(".glyphicon-remove").click(function(){
        $(this).parents().find('.bg-success').hide();
    })
})
