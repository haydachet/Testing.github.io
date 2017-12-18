    $(document).ready(function() {

    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 _\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot, space and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'This field address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'This field is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This field can accept only number'
                    },
					stringLength: {
                        min: 5,
                        max: 10,
                        message: 'The phonenumber must be more than 5 and less than 10 digits long'
                    }
                }
            },
            subject: {
                validators: {
                    notEmpty: {
                        message: 'This field is required'
                    },
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'This field is required'
                    },
                }
            },
        }
    });
});