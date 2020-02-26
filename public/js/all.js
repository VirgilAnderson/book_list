$(document).ready(function(){
    // Control Function
    $('a.delete').each(function(index) {
        $(this).click(function() {
            $("form[name="+$(this).attr('id')+"]").submit();
        });
    });
});
