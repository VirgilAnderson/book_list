$(document).ready(function(){
    // Control Function
    $('a.delete').each(function(index) {
        $(this).click(function() {
            $("form[name="+$(this).attr('id')+"]").submit();
        });
    });

    // Swap Controls
    $('button.up').each(function(index) {
        $(this).click(function() {
             if ($(this).closest("tr").prev().attr('id'))
            {
                $('#input_'+$(this).closest("tr").attr('id')).val($(this).closest("tr").prev().attr('id'));
                $('form[name="swap_'+$(this).closest("tr").attr('id')+'"]').submit();
            }
        });
    });

    $('button.down').each(function(index) {
        $(this).click(function() {
             if ($(this).closest("tr").next().attr('id'))
            {
                $('#input_'+$(this).closest("tr").attr('id')).val($(this).closest("tr").next().attr('id'));
                $('form[name="swap_'+$(this).closest("tr").attr('id')+'"]').submit();
            }
        });
    });

});
