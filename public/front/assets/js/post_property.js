$("#btn-submit").click(function(e) {

    e.preventDefault();

    var propertystatus = $('.propertyStatus:checked').val();
    var property_type = $('#property_type').val();
    var property_category_dropdown = $('#property_category_dropdown').val();
    var state_id = $('#state_id').val();
    var city_dropdown = $('#city_dropdown').val();
    var locality = $('#locality').val();
    var address = $('#address').val();
    var name_of_project = $('#name_of_project').val();
    var no_of_flats = $('.no_of_flats:checked').val();
    var total_floors = $('#total_floors').val();
    var total_bedrooms = $('#total_bedrooms').val();
    var total_balconies = $('#total_balconies').val();
    var total_bathrooms = $('#total_bathrooms').val();
    var descr = $('#descr').val();
    var amenitiesArray = new Array();
    $('input[name="amenities[]"]:checked').each(function(){
        amenitiesArray.push($(this).val());
    });
    // Append Array to String
    // var dataString = 'amenitiesArray='+ amenitiesArray;
    var floors_allowed_for_construction = $('#floors_allowed_for_construction').val();
    var no_of_open_sides = $('#no_of_open_sides').val();
    var width_of_road_facing_plot = $('#width_of_road_facing_plot').val();
    var any_construction = $('#any_construction').val();
    var boundary_wall = $('#boundary_wall').val();
    var carpet_area = $('#carpet_area').val();
    var super_area = $('#super_area').val();
    var plot_area = $('#plot_area').val();
    var plot_length = $('#plot_length').val();
    var plot_breadth = $('#plot_breadth').val();
    var price = $('#price').val();
    var booking_amount = $('#booking_amount').val();
    var furnished_status = $('#furnished_status').val();
    var possession_status = $('#possession_status').val();
    var datepicker = $('#datepicker').val();
    var age = $('#age').val();
    var monthly_maintenance_charge = $('#monthly_maintenance_charge').val();
    var url = $('#propertyForm').attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        data:{
            propertystatus:propertystatus,
            property_type:property_type,
            property_category_dropdown:property_category_dropdown,
            state_id:state_id,
            city_dropdown:city_dropdown,
            locality:locality,
            address:address,
            name_of_project:name_of_project,
            no_of_flats:no_of_flats,
            total_floors:total_floors,
            total_bedrooms:total_bedrooms,
            total_balconies:total_balconies,
            total_bathrooms:total_bathrooms,
            descr:descr,
            amenitiesArray:amenitiesArray,
            floors_allowed_for_construction:floors_allowed_for_construction,
            no_of_open_sides:no_of_open_sides,
            width_of_road_facing_plot:width_of_road_facing_plot,
            any_construction:any_construction,
            boundary_wall:boundary_wall,
            carpet_area:carpet_area,
            super_area:super_area,
            plot_area:plot_area,
            plot_length:plot_length,
            plot_breadth:plot_breadth,
            price:price,
            booking_amount:booking_amount,
            furnished_status:furnished_status,
            possession_status:possession_status,
            datepicker:datepicker,
            age:age,
            monthly_maintenance_charge:monthly_maintenance_charge,
            _token: $('#token').val(),
        },
        beforeSend: function() {
            $('#btn-submit').html('Please Wait...');
        },
        success: function(data)
        {
            if(data = 'suceess'){
                stepper.next();
            }
        }
    });

});
