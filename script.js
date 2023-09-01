$(document).ready(function () {
    $('.table-cell').click(function () {
        if (!$(this).hasClass('editing')) {
            var fieldValue = $(this).text();
            var fieldId = $(this).data('id');
            var fieldName = $(this).data('field');

            $(this).addClass('editing');
            $(this).html('<input type="text" value="' + fieldValue + '">');
            $(this).find('input').focus();

            $(this).find('input').blur(function () {
                var newValue = $(this).val();
                $(this).parent().removeClass('editing');
                $(this).parent().html(newValue);

                // Perform AJAX request to update the database
                $.ajax({
                    method: 'POST',
                    url: 'update_data.php', // Create this PHP file to handle the update
                    data: {
                        id: fieldId,
                        field: fieldName,
                        value: newValue
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            });
        }
    });
});
