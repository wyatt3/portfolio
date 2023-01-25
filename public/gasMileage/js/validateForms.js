$(function() {
    $("form[name='loginValidate']").validate({
        rules: {
            username: "required",
            password: "required"
        },
        
        messages: {
            username: "Enter Username.",
            password: "Enter Password."
        }
    });

	$("form[name='fillUpValidate']").validate({
        //validation rules
        rules: {
            // The key name is the name attribute of an input field.
            // Define the validation rules for each field.
            mileage: "required",
            tripMiles: "required",
            gallons: "required",
            total: "required"
            
        },
        // Setup Error Messages
        messages: {
            mileage: "Please enter the mileage.",
            tripMiles: "Please enter the trip mileage.",
            gallons: "Please enter the number of gallons.",
            total: "Please enter the total."
        }
    });

	$("form[name='maintValidate']").validate({
        rules: {
            mileage: "required",
            cost: "required",
            description: "required"
            
        },
        messages: {
            mileage: "Please enter the mileage.",
            cost: "Please enter the cost.",
            description: "Please enter a description."
        }
    });

    $("form[name='addCarValidate']").validate({
        rules: {
            year: {
                required: true,
                digits: true
            },
            make: "required",
            model: "required",
            mileage: {
                required: true,
                digits: true
            }
        },
        messages: {
            year: {
                required: "Please enter the year of your car.",
                digits: "Please enter only numbers."
            },
            make: "Please enter the make of your car",
            model: "Please enter the model of your car",
            mileage: {
                required: "Please enter the mileage of your car.",
                digits: "Please enter only numbers."
            }
        }
    });

    $("form[name='editAccount']").validate({
        rules: {
            oldPass: "required",
            newPass: "required",
            confirmPass: {
                required: true,
                equalTo: "#newPss"
            }
        },
        messages: {
            oldPass: "Enter your old password.",
            newPass: "Enter a new password.",
            confirmPass: {
                required: "Please enter the password again.",
                equalTo: "Passwords must match."
            }
        }

    });

    $("form[name='editUsername']").validate({
        rules: {
            username: "required"
        },
        messages: {
            username: "Please enter a username."
        }

    });

});