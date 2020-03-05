$(document).ready(function () {

    var count = 1;

    dynamic_field(count);

    function dynamic_field(number) {
        html = '<tr id=' + number + '>';
        html += '<td><div><input type="text" name="Product Name" class="form-control" /></div></td>';
        html += '<td><div><input type="text" name="Quantity" class="form-control" /></div></td>';

        if (number > 1) {
            html +=
                '<td><button type="button" name="remove" data-rel="' + number + '" class="btn btn-danger remove">Remove</button></td></tr> ';
            $('tbody').append(html);
        } else {
            html +=
                '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
    }

    $(document).on('click', '#add', function () {
        count++;
        dynamic_field(count);
    });

    $(document).on('click', '.remove', function () {
        var currentId = $(this).attr('data-rel');
        $('tr#' + currentId).hide('slow');

    });


});


