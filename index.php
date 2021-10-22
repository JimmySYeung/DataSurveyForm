<html lang="en">

<head>
    <title>CSC 642 Fall 2021 Individual Assignment Jimmy Yeung</title>
    <!-- Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap Validator -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">
    </script>
    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Custom Stylesheet -->
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <br>
    <center>
        <h2>CSC 642 Fall 2021 Individual Assignment Jimmy Yeung</h2>
        <h1>Data Survey Form</h1>
        <br> Welcome to Data Survey Form. This project is intended for demonstration purposes only.
        <br> Please fill out your information below:</center>
    <br>
    <div class="container center-div">
        <div class="container jumbotron jumbotron-fluid" id="main-container">
            <div class="container center-div">
                <div class="col-lg-12">
                    <form id="surveyForm" action="verify.php" method="POST" data-toggle="validator">
                        <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-5 has-feedback">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" pattern="[a-zA-Z]+" required>
                                </div>
                            </div>
                            <div class="wrapper">
                                <div class="form-group col-md-5 has-feedback">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" pattern="[a-zA-Z]+" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-10">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" pattern="[a-zA-Z0-9]+" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-7">
                                    <label for="education">Education Status</label>
                                    <select name="education" id="education" class="form-control">
                                        <option value="">Choose Education Status</option>
                                        <option>none</option>
                                        <option>student</option>
                                        <option>professor</option>
                                        <option>staff</option>
                                        <option>retired</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-7">
                                    <label for="income">Monthly Budget for Service</label>
                                    <select name="income" id="income" class="form-control">
                                        <option value="">Choose Month Budget</option>
                                        <option>
                                            < $50k</option>
                                                <option>$50k - $100k</option>
                                                <option>> $100k</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <p class="birthday">Height</p>
                        <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="feet">Feet</label>
                              <input type="text" class="form-control" name="feet" id="feet" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inches">Inches</label>
                                <input type="text" class="form-control" name="inches" id="inches" required>
                            </div>
                        </div>
                        </div>
                        <br>
                        <p class="birthday">Contacts</p>
                        <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-5">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required>
                                    <p class="form-text text-muted">
                                        <h5>
                                        Your phone number must contain 10 digits.
                                      </h5>
                                    </p>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-7">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="wrapper2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms"> I agree to the <a href="FormAux.html" target="_blank">terms and conditions.</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="wrapper">
                                <div class="form-group col-md-6">
                                    <div class="g-recaptcha" id="rcaptcha" data-sitekey="6LfnQeQcAAAAADlUDOV7_-rFTafJeD0WYHcleyZE"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <button type="submit" class="btn btn-warning" style="float: right;">SUBMIT</button>
                            <button type="reset" class="btn btn-default" style="float: left;">CANCEL</button>
                        </div>
                        <h5>
                                        <a href="FormAux.html" target="_blank" style="float: right;"></a>
                                      </h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <script type="text/javascript">
    // (Field validations: first  and last name up to 40 characters; phone - 7 positive digits;, address – each entry up to 40 alpha numeric characters; Zip code- positive 5 digit number). 
    $(document).ready(function() {
        $('#surveyForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                firstName: {
                    validators: {
                        stringLength: {
                            max: 40
                        },
                        notEmpty: {
                            message: 'Please type your first name.'
                        }

                    }
                },
                lastName: {
                    validators: {
                        stringLength: {
                            max: 40
                        },
                        notEmpty: {
                            message: 'Please type your last name.'
                        }
                    }
                },
                address: {
                    validators: {
                        stringLength: {
                            max: 200
                        },
                        notEmpty: {
                            message: 'Please type your address.'
                        }
                    }
                },
                education: {
                    validators: {
                        notEmpty: {
                            message: 'Please select your educational level.'
                        }
                    }
                },
                income: {
                    validators: {
                        notEmpty: {
                            message: 'Please select your income.'
                        }
                    }
                },
                phone: {
                    validators: {
                        numeric: {
                            message: 'This field should contain a number.'
                        },
                        notEmpty: {
                            message: 'Please type your phone number.'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please type your E-mail.'
                        },
                        emailAddress: {
                            message: 'Please enter a valid email address.'
                        }
                    }
                },
                terms: {
                    validators: {
                        notEmpty: {
                            message: 'Please agree to the terms and conditions.'
                        }
                    }
                },
            }
        })
    });
    </script>


</body>

</html>