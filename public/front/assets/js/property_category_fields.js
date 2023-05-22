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

    // add new
    $('.possessionStatus').hide();
    $('.facilitiesamenities').hide();
    $('.property_age').hide();

    $("#property_category_dropdown").on('change',function () {
        var property_category_id = $(this).val();
        console.log(property_category_id);
        if(property_category_id === '1')
        { 

            $('.numberOfFlats').show();
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.totalBathrooms').show();
            $('.furnishedStatus').show();
            $('.carpetArea').show();
            $('.superArea').show();
            $('.possessionStatus').show();
            $('.property_age').show();

        }
        if(property_category_id === '2')
        {   
            // $('.numberOfFlats').show();
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.totalBathrooms').show();
            $('.furnishedStatus').show();
            $('.carpetArea').show();
            $('.superArea').show();
            $('.possessionStatus').show();
            $('.floorAllowedForConstruction').show();
            $('.noOfOpenSides').show();
            $('.widthOfRoadFacing').show();
            $('.property_age').show();
            
        }
        if(property_category_id === '3')
        {
            
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.furnishedStatus').show();
            $('.carpetArea').show();
            $('.superArea').show();
            $('.possessionStatus').show();
            $('.totalBathrooms').show();
            $('.noOfOpenSides').show();
            $('.widthOfRoadFacing').show();
            $('.property_age').show();
        }
        if(property_category_id === '4')
        {
            
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.totalBathrooms').show();
            $('.furnishedStatus').show();
            $('.carpetArea').show();
            $('.superArea').show();
            $('.possessionStatus').show();
            $('.property_age').show();
        }

        if(property_category_id === '5')
        {
            $('.floorAllowedForConstruction').show();
            $('.noOfOpenSides').show();
            $('.anyConstructionMade').show();
            $('.widthOfRoadFacing').show();
            $('.boundaryWallMade').show();
            $('.plotArea').show();
            $('.plotLength').show();
            $('.plotBreadth').show();
            
        }

        if(property_category_id === '6')
        {
            $('.numberOfFlats').show();
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.furnishedStatus').show();
            $('.totalBalconies').show();
            $('.carpetArea').show();
            $('.superArea').show();
            $('.possessionStatus').show();
        }
        
        if(property_category_id === '7')
        {
            $('.numberOfFlats').show();
            $('.totalBedrooms').show();
            $('.totalBalconies').show();
            $('.totalFloors').show();
            $('.furnishedStatus').show();
            $('.totalBalconies').show();
            $('.carpetArea').show();
            $('.superArea').show();
            $('.possessionStatus').show();
        }
    });
});
