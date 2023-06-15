<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Pertemuan 25 - Register</title>
    <link href="style.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f8f8;
            background: linear-gradient(to right, #fafbfc, #448ff1);
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

                <div class="card border-0 shadow rounded-3 mb-5 mt-2">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Dzikri Store</h5>
                        <form action="index.blade.php" method="POST">
                            
                            <body>
                                <div class="signin">
                                  <div class="back-img">
                                    <div class="sign-in-text">
                                      <h2 class="active">REGISTER</h2>
                                    </div><!--/.sign-in-text-->
                                    <div class="layer">
                                    </div><!--/.layer-->
                                    <p class="point">&#9650;</p>
                                  </div><!--/.back-img-->
                                  <div class="form-section">
                                   
                                    <form action="#">
                                      <!--username-->
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="email" id="sample3">
                                        <label class="mdl-textfield__label" for="sample3">Fullname</label>
                                      </div>
                                      <br/>
                                      <!--Email-->
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="email" id="sample3">
                                        <label class="mdl-textfield__label" for="sample3">Email</label>
                                      </div>
                                      <br/>
                                      <!--Password-->
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input pattern=".{8,}" class="mdl-textfield__input" type="password" id="sample3">
                                        <label class="mdl-textfield__label" for="sample3">Password</label>
                                      </div>
                                      <br/>
                                      <!--Password-->
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input pattern=".{8,}" class="mdl-textfield__input" type="password" id="sample3">
                                        <label class="mdl-textfield__label" for="sample3">Confirm Password</label>
                                      </div>
                                      <br/>
                    
                                      <!--CheckBox-->
                                      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                                      <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
                                      <span class="keep-text mdl-checkbox__label">Are you sure?</span>
                                    </label>
                                    </form>
                                  </div><!--/.form-section-->
                                  
                                  <button class="sign-in-btn mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored">
                                    Confirm Register
                                  </button><!--/button-->
                               </div><!--/.signin-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

