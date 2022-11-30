require('./bootstrap');

/*window.$ = require('jquery');
require('./jQuery-provider.js');
tempusDominus.extend(window.tempusDominus.plugins.customDateFormat);*/

$(document).ready(function() {
    $('.add-more').click(function(){
        if($.trim($('#datetimepickerInput').val()).length != 0) {
            var newDate = $('#datetimepickerInput').val();
            $('.copy .date-value').val(newDate);
            var copy = $('.copy>.input-group').clone();
            $('.after-add-more').append(copy);
            $('#datetimepickerInput').val('');
        }
    });

    $('body').on('click', '.remove' , function(){
        $(this).parents('.control-group').remove();
    });

    $('form.simple').submit(function(e) {
        var error = false,
            errorMessage = '',
            formTextInputs = $(this).find(':input[type=text]');

        if (formTextInputs.length > 0) {
            formTextInputs.each(function(){
                if ($.trim($(this).val()).length == 0) {
                    error = true;
                    errorMessage = 'Fill all form text fields!';
                    return false;
                }
            });
        } else {
            error = true;
            errorMessage = 'No new items created!';
        }

        if (error) {
            e.preventDefault();
            alert(errorMessage);
        }
    });

    const datetimepicker = $('#datetimepicker').tempusDominus({
        localization: {
            locale: 'en-US',
            format: 'yyyy-MM-dd HH:mm'
        }
    });
});