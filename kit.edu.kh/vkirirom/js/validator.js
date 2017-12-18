    $(document).ready(function() {

    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            userName: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required'
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
            userEmail: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            userPhone: {
                validators: {
                    notEmpty: {
                        message: 'The phonenumber is required'
                    },
                    regexp: {
                        regexp: /^[0-9 _\+]+$/,
                        message: 'The phonenumber can only consist of alphabetical and +'
                    }
                }
            },
            userMsg: {
                validators: {
                    notEmpty: {
                        message: 'The message is required'
                    },
                }
            },
        }
    });
});