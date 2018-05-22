function formValidation() {
    "use strict";
    /*----------- BEGIN validationEngine CODE -------------------------*/
    // $('#popup-validation').validationEngine();
    /*----------- END validationEngine CODE -------------------------*/

    /*----------- BEGIN validate CODE -------------------------*/
    $('#inline-validate').validate({
        rules: {
            required: "required",
            email: {
                required: true,
                email: true
            },
            date: {
                required: true,
                date: true
            },
            url: {
                required: true,
                url: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            agree: "required",
            minsize: {
                required: true,
                minlength: 3
            },
            maxsize: {
                required: true,
                maxlength: 6
            },
            minNum: {
                required: true,
                min: 3
            },
            maxNum: {
                required: true,
                max: 16
            }
        },
        errorClass: 'help-block col-lg-6',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });


    $('#block-validate').validate({
        rules: {
            product_name_eng: "required",
            product_name_arbic: "required",
            interest_rate: {
                required: true,
                number: true
            },
            average_processing_time: {
                required: true,
                number: true
            },
            application_fees: {
                required: true,
                number: true
            },
            other_onetime_fees: {
                required: true,
                number: true
            },
            other_monthly_fees: {
                required: true,
                number: true
            },
            min_applicant_age: {
                required: true,
                number: true
            },
            max_applicant_age: {
                required: true,
                number: true
            },
            min_amount: {
                required: true,
                number: true
            },
            max_amount: {
                required: true,
                number: true
            },
            max_amnt_relative_income: {
                required: true,
                number: true
            },
            min_tenure: {
                required: true,
                number: true
            },
            max_tenure: {
                required: true,
                number: true
            },
            min_month_income: {
                required: true,
                number: true
            },
            max_month_income: {
                required: true,
                number: true
            },
            employment_status: "required",
            business_type: "required",
            company_type: "required",
            salary_transfer_rqd: "required",
            company_name_eng: "required",
            company_name_arbic: "required",
            amount: {
                required: true,
                number: true
            },
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
    /*----------- END validate CODE -------------------------*/

    $('#adminlogin-validate').validate({
        rules: {
            username: "required",
            password: "required",

        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });


    $('#admin-validate').validate({
        rules: {
            bank_name: "required",
            username: "required",
            password: "required",
            picture: "required",
            product_listing: "required",
            package_id: "required",
            email: {
                required: true,
                email: true
            }

        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
    $('#video-validate').validate({
        rules: {
            home_videourl: "required",
            video_text: "required",
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
    $('#video-validate').validate({
        rules: {
            home_videourl: "required",
            video_text: "required",
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });

    $('#footer-content-valid').validate({
        rules: {
            footer_text1: "required",
            footer_logo_link: "required",
            facebook_url: "required",
            twitter_url: "required",
            gplus_url: "required",
            footer_logo_link: "required",
            
            footer_logo2_link: "required",

        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
    
    
    
    $('#siteset-validate').validate({
        rules: {
            site_title: "required",
            contact_email: "required",
            twitter_url: "required",
            linkedIn_url: "required",
            facebook_url: "required",
            gplus_url: "required",
            youtube_url: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
    $('#siteset-homecontent').validate({
        rules: {
            bannerheading: "required",
            bannner_subtxt1: "required",
            bannner_subtxt2: "required",
            bannner_subtxt3: "required",
            howit_heading1: "required",
            howit_text1: "required",
            howit_heading2: "required",
            howit_text2: "required",
            howit_heading3: "required",
            howit_text3: "required",
            bannerheading2:"required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });

    $('#question-validate').validate({
        rules: {
            question: "required",
            answer: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });

    $('#subquestion-validate').validate({
        rules: {
            title: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });

    
    $('#medicine-validate').validate({
        rules: {
            title: "required",
            slug: "required",
            description: "required",
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
   
    $('#mq-validate').validate({
        rules: {
            qid: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });    
    
    $('#contact_validate').validate({
        rules: {
            name  : "required",
            phone  : "required",
            email : {
                required: true,
                email: true
            },
            msg  : "required",
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });     
    
    
    $('#fpass_validate').validate({ 
        rules: {
            email : {
                required: true,
                email: true
            },
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });     
    
    $('#reset_validate').validate({ 
        rules: { 
            password: {
                required: true,
                minlength: 5
            },
            cpassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });   
    
    
    $('#checkout_validate').validate({ 
        rules: { 
            card: "required",
            card_number: {
                required: true,
                minlength: 16,
                maxlength: 16
            },
            firstname: "required",
            lastname: "required",
            expiry_month: "required",
            expiry_year: "required",
            cvv: {
                required: true,
                minlength: 3,
                maxlength: 3
            },            
            
            
            ship_address: "required",
            ship_city: "required",
            ship_region: "required",
            ship_postcode: "required",
            ship_country: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });   
    
    
     $('#search_validate').validate({ 
        rules: {
            searchhead: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });  
    
     $('#admsearch-validate').validate({ 
        rules: {
            searchheadadm: "required"
        },
        errorClass: 'help-block',
        errorElement: 'span',
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        }
    });     
    
    
   $( "#frmRegister" ).validate({
        //alert('ok');
        rules: {
          'full_name': "required",
          
          'phone': "required",
          'utype': "required",
          'email': {
            required: true           
          },
                  
          'password': {
            required: true,
            minlength: 6
          },
          'con_password': {
            required: true,
            minlength: 6
          }
          
        },
        messages: {
          'utype': "Please choose user type", 
          'full_name': "Please enter your firstname",
          
          'email': "Please enter a valid email address", 
          'phone': "Please enter a valid mobileno.", 
                 
          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          'con_password': {
            required: "Please re-type  password",
            minlength: "Your password must be same as above password"
          }
        },
        
       
      }); 
    
    
}