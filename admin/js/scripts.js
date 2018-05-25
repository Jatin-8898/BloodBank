
/*FOR THE EDIT AND DELETE TOOLTIP*/
$(document).ready(function(){
    $('.del-tooltip').tooltip(); 
});

$(document).ready(function(){
    $('.edit-tooltip').tooltip();     
});


    $(".remove").click(function(){
        var donor_id = $(this).attr('data-donor-id');
        console.log(donor_id+" got");
        
        
        alertify.confirm('Delete', 'Are You Sure you Want to delete this Donor Record??', function(){
                $.ajax({
					 type: 'POST',
					 url: 'includes/donors/delete-donor.php',
					 data: 'donor_id=' + donor_id
				 }).done(function (response) {
                    
                     //window.alert(response);  
                })  
                alertify.success('DELETED SUCESSFULLY')
        
    }, function(){ 
        alertify.error('Cancelled')
    
    });

    })


      $(".remove-seeker").click(function(){
        var seeker_id = $(this).attr('data-seeker-id');
        console.log(seeker_id+" got");
        
        
        alertify.confirm('Delete', 'Are You Sure you Want to delete this Seeker Record??', function(){
                $.ajax({
					 type: 'POST',
					 url: 'includes/seekers/delete-seeker.php',
					 data: 'seeker_id=' + seeker_id
				 }).done(function (response) {
                     //window.alert(response);  
                })  
                alertify.success('DELETED SUCESSFULLY')
        
    }, function(){ 
        alertify.error('Cancelled')
    
    });

    })


    
/*  alertify.prompt( message, function (e, str) {
	if (e) {
		// after clicking OK
		// str is the value from the textbox
	} else {
		// after clicking Cancel
	}
});*/
    
    




/*VALIDATION FOR ADD DONOR FORM*/
$(document).ready(function() {              //id of the form
    $('#addDonor').bootstrapValidator({              //options of validator
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',            //icons
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        donor_blood_type: {
            validators: {
                    notEmpty: {
                    message: 'Please select the BLOOD TYPE'
                }
            }
        },
        donor_username: {
            validators: {
                notEmpty: {
                    message: 'The Username is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The username can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The FIRST NAME must be less than 10 characters long'
                }
            }
        },
        donor_fname: {
            validators: {
                notEmpty: {
                    message: 'The FIRST NAME is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The First Name can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The FIRST NAME must be less than 10 characters long'
                }
            }
        },
        donor_mname: {
            validators: {
                notEmpty: {
                    message: 'The MIDDLE NAME is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Middle Name can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The MIDDLE NAME must be less than 10 characters long'
                }
            }
        },
        donor_lname: {
            validators: {
                notEmpty: {
                    message: 'The LAST NAME is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The username can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The LAST NAME must be less than 10 characters long'
                }
            }
        },

        donor_age: {
            validators: {
                    notEmpty: {
                    message: 'Please enter the AGE'
                }
            }
        },
        donor_weight: {
            validators: {
                    notEmpty: {
                    message: 'Please enter the WEIGHT'
                }
            }
        },
        donor_gender: {
            validators: {
                    notEmpty: {
                    message: 'Please select the Gender'
                }
            }
        },
        donor_city: {
            validators: {
                notEmpty: {
                    message: 'Please enter the CITY'
                }
            }
        },
        donor_email: {
            validators: {
                notEmpty: {
                        message: 'The EMAIL address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid email address'
                    }
            }
        },
        donor_phone: {
            validators: {
                notEmpty: {
                    message: 'PHONE number is required cannot be empty'
                },
                stringLength: {
                    min: 10,
                    max: 10,
                    message: 'Phone number cannot be greater than 10 characters'
                }
            }
        },
        image: {
            validators: {
                file: {
                        extension: 'jpeg,jpg,png,jfif',
                        type: 'image/jpeg,image/png',
                        maxSize: 2048 * 1024,
                        message: 'The selected file is not valid'
                    },
                notEmpty: {
                    message: 'Please attach the IMAGE'
                }
            }
        },
    
        donor_address: {
            validators: {
                notEmpty: {
                    message: 'Please enter the ADDRESS'
                }
            }
        },
        }
    });
});

/*VALIDATION FOR ADD SEEKER FORM*/
$(document).ready(function() {              //id of the form
    $('#addSeeker').bootstrapValidator({              //options of validator
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',            //icons
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        seeker_blood_type: {
            validators: {
                    notEmpty: {
                    message: 'Please select the BLOOD TYPE'
                }
            }
        },
        seeker_username: {
            validators: {
                notEmpty: {
                    message: 'The Username is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The username can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The FIRST NAME must be less than 10 characters long'
                }
            }
        },
        seeker_fname: {
            validators: {
                notEmpty: {
                    message: 'The FIRST NAME is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The First Name can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The FIRST NAME must be less than 10 characters long'
                }
            }
        },
        seeker_mname: {
            validators: {
                notEmpty: {
                    message: 'The MIDDLE NAME is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Middle Name can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The MIDDLE NAME must be less than 10 characters long'
                }
            }
        },
        seeker_lname: {
            validators: {
                notEmpty: {
                    message: 'The LAST NAME is required and cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The username can only consist of alphabets'
                },
                stringLength: {
                    max: 10,
                    message: 'The LAST NAME must be less than 10 characters long'
                }
            }
        },

        seeker_age: {
            validators: {
                    notEmpty: {
                    message: 'Please enter the AGE'
                }
            }
        },
        seeker_weight: {
            validators: {
                    notEmpty: {
                    message: 'Please enter the WEIGHT'
                }
            }
        },
        seeker_gender: {
            validators: {
                    notEmpty: {
                    message: 'Please select the Gender'
                }
            }
        },
        seeker_city: {
            validators: {
                notEmpty: {
                    message: 'Please enter the CITY'
                }
            }
        },
        seeker_email: {
            validators: {
                notEmpty: {
                        message: 'The EMAIL address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid email address'
                    }
            }
        },
        seeker_phone: {
            validators: {
                notEmpty: {
                    message: 'PHONE number is required cannot be empty'
                },
                stringLength: {
                    min: 1,
                    max: 10,
                    message: 'Phone number cannot be greater than 10 characters'
                }
            }
        },
        image: {
            validators: {
                file: {
                        extension: 'jpeg,jpg,png,jfif',
                        type: 'image/jpeg,image/png',
                        maxSize: 2048 * 1024,
                        message: 'The selected file is not valid'
                    },
                notEmpty: {
                    message: 'Please attach the IMAGE'
                }
            }
        },
    
        seeker_address: {
            validators: {
                notEmpty: {
                    message: 'Please enter the ADDRESS'
                }
            }
        },
        }
    });
});

/*VALIDATION FOR ADD USER FORM*/
$(document).ready(function() {              //id of the form
    $('#addUser').bootstrapValidator({              //options of validator
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',            //icons
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        user_firstname: {                               /*WE R APPLYING REGEX FIRSTNAME & LASTNAME SHOULDNT BE SAME AND PASS ALSO*/
            validators: {
                notEmpty: {
                    message: 'The firstname is required and cannot be empty'
                },
                stringLength: {
                    min: 3,
                    max: 20,
                    message: 'The firstname must be less minimun 3 and less than 20 characters long'
                },
                regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabets and number'
                },
                different: {
                        field: 'user_password',
                        message: 'The username and password cannot be the same as each other'
                },
                
            }
        },
        user_lastname: {
            validators: {
                    notEmpty: {
                    message: 'The lastname is required and cannot be empty'
                },
                stringLength: {
                    max: 20,
                    message: 'The firstname must be less than 20 characters long'
                },
                regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabets and number'
                },
                different: {
                        field: 'user_firstname',
                        message: 'The First name and Last Name should not be the same as each other'
                },
                different: {
                        field: 'user_password',
                        message: 'The username and password cannot be the same as each other'
                }

            }
        },
        user_email: {
            validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid email address'
                    }
                }
        },
        user_role: {
            validators: {
                    notEmpty: {
                    message: 'Please select the Role'
                }
            }
        },
        user_name: {
            validators: {
                notEmpty: {
                    message: 'UserName cannot be empty'
                },
                regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabets and number'
                }
                
            }
        },
        user_password: {
            validators: {
                notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'user_name',
                        message: 'The password cannot be the same as UserName'
                    },
                    stringLength: {
                        min: 5,
                        message: 'The password must have at least 5 characters just for testing'
                    }
            }
        },
        user_password_confirm: {
            validators: {
                notEmpty: {
                    message: 'Confirm Password cannot be empty'
                }
            }
        },
        user_image: {
            validators: {
                file: {
                        extension: 'jpeg,jpg,png,jfif',
                        type: 'image/jpeg,image/png',
                        maxSize: 2048 * 1024,
                        message: 'The selected file is not valid'
                    },
                notEmpty: {
                    message: 'User Image cannot be empty'
                }
            }
        },    
            
        } 
    });
});

