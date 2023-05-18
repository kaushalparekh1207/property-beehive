$(document).ready(function () {
    $('.totalFloors').hide();
    $('.numberOfFlats').hide();
    $('.totalBedrooms').hide();
    $('.totalBalconies').hide();
    $('.totalBathrooms').hide();
    $('.totalWashrooms').hide();
    $('.personalWashroom').hide();
    $('.pantry').hide();
    $('.cornerShowRoom').hide();
    $('.isMainRoadFacing').hide();
    $('.floorAllowedForConstruction').hide();
    $('.noOfOpenSides').hide();
    $('.widthOfRoadFacing').hide();
    $('.anyConstructionMade').hide();
    $('.boundaryWallMade').hide();
    $('.carpetArea').hide();
    $('.superArea').hide();
    $('.plotArea').hide();
    $('.plotLength').hide();
    $('.plotBreadth').hide();
    $('.currentlyLeasedOut').hide();
    $('.leasedTo').hide();
    $('.monthlyRent').hide();
    $('.rent_lease_details').hide();
    $('.securityAmount').hide();
    $('.maintenanceCharges').hide();
    $('.perCharges').hide();
    $('.furnishedStatus').hide();

    $("#property_category_dropdown").on('change',function () {
        var property_category_id = $(this).val();
        if(property_category_id === '1')
        {
            $('.numberOfFlats').show();
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.furnishedStatus').show();
            $('.totalBalconies').show();
        }
        if(property_category_id === '2')
        {

        }
        if(property_category_id === '3')
        {

        }
        if(property_category_id === '4')
        {

        }
    });
});
