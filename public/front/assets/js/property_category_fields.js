$(document).ready(function () {
    $('.totalFloors').hide();
    $('.numberOfFlats').hide();
    $('.totalBedrooms').hide();
    $("#property_category_dropdown").on('change',function () {
        var property_category_id = $(this).val();
        if(property_category_id === 1)
        {
            $('.numberOfFlats').show();
        }
    });
});
