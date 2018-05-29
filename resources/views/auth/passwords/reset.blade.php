<!DOCTYPE html>
<html>
<title>Dashboard Login</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('backend/css/main.css') }}" rel="stylesheet">
    <style>
        #error,#fgError,#rgErrorName,#rgErrorEmail,#rgErrorPassword,#rgErrorCpassword 
        {
            border: 1px solid red;
            padding: 5px;
            text-align: center;
            font-size: 15px;
            font-weight: normal;
            background: #f44336;
            color: white;
            margin-top: 10px;
            margin-bottom: 10px;
            display:none;
        }
        .btn-info
        {
            background:#f4433600;
            border:1px solid black;
            color:black;
        }
        html { height:100%; }
        body { position:absolute; top:0; bottom:0; right:0; left:0; height:100%;}
    </style>
</head>
<body>
    <div class="form_custom_section">
        <div class="heading_section">
        <h2>Dashboard Login Form</h2>
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Click here for Login</button>
        </div>
        <div id="id01" class="modal">
        <form class="modal-content animate" method="post" id="loginForm">
        @csrf
            <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
            <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>=
            <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
            <div id="error">
                
            </div>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="button" style="float:right;" onclick="document.getElementById('myModal').style.display='block'" class="cancelbtn btn-info" id="fgbtn">Forgot Password ? </button>
                <button type="button" style="margin-left: 68%;" onclick="document.getElementById('').style.display='block'" class="cancelbtn btn-info" id="rgbtn">Register&nbsp;</button>
            </div>
        </form>
        <!-- forgot password form -->
        <div id="fg" class="modal">
        <form class="modal-content animate" method="POST" action="{{ route('password.request') }}" id="forgotForm">
            @csrf
            <div class="imgcontainer">
            <span onclick="document.getElementById('fg').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
            <label for="uname"><b>Username</b></label>
                <input type="email" placeholder="email" name="email" required>
            <button type="submit">Send Password Link</button>
            <div id="fgError">
            </div>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('fg').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
        </div>
    </div>
    <div id="rg" class="modal">
        <form class="modal-content animate" method="POST" action="{{ route('register') }}" id="registerform">
            @csrf
            <div class="imgcontainer">
            <span onclick="document.getElementById('rg').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="name" name="name" value="{{ old('name') }}" required>
                <div id="rgErrorName">
                </div>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="email" name="email" value="{{ old('email') }}" required>   
                <div id="rgErrorEmail">
                </div>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="password" name="password" value="{{ old('password') }}" required>
                <div id="rgErrorPassword">
                </div> 
                <label for="password-confirm"><b>Confirm Password</b></label>
                <input type="password" placeholder="password" id="password-confirm"name="password_confirmation" value="{{ old('password_confirmation') }}" required>  
                <button type="submit">Register</button>      
                <div id="rgErrorCpassword">
                </div>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('rg').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
        </div>
    </div>
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    $(document).ready(function(){
        var loginForm = $("#loginForm");
        loginForm.submit(function(e){
        e.preventDefault();
        var formData = loginForm.serialize();
        console.log(formData);
            $.ajax({
                url:'login',
                type:'POST',
                data:formData,
                success:function(done){
                    window.location.replace("{{ route('dashboard') }}");
                },
                error: function (xhr) {
                    $('#error').hide().html(xhr.responseJSON.errors.email[0]).slideDown();
                }
            });
        });
        $('#fgbtn').click(function(){
        $('#fg').css('display','block');
    });
        $('#rgbtn').click(function(){
        $('#rg').css('display','block');
    });
    // forgot password
    var forgotForm = $("#forgotForm");
        forgotForm.submit(function(e){
        e.preventDefault();
        var formFgData = forgotForm.serialize();
        console.log(formFgData);
            $.ajax({
                url:"{{ env('APP_URL') }}password/email",
                // dataType:'json',
                type:'POST',
                data:formFgData,
                success:function(complete){
                    // console.log(complete);
                    window.location.replace("{{ route('login') }}");
                },
                error: function (err) {
                    $('#fgError').hide().html(err.responseJSON.errors.email[0]).slideDown();
                    console.log(err);
                }
            });
        });
        //Register form
        var registerform = $("#registerform");
        registerform.submit(function(e){
        e.preventDefault();
        var formRgData = registerform.serialize();
       console.log(formRgData);
            $.ajax({
                url:"{{ URL::to('register-user') }}",
                dataType:'json',
                type:'POST',
                data:formRgData,
                success:function(complete){
                    window.location.replace("{{ route('login') }}");
                },
                error: function (err) {
                    try{
                        $('#rgErrorEmail').hide().html(err.responseJSON[0]['email'][0]).slideDown();
                    }catch {
                        $('#rgErrorEmail').hide().html(err.responseJSON[0]['email'][0]).slideUp();
                    }
                    try{
                        $('#rgErrorName').hide().html(err.responseJSON[0]['name'][0]).slideDown();
                    }catch {
                        $('#rgErrorName').hide().html(err.responseJSON[0]['name'][0]).slideUp();
                    }
                    try{
                        $('#rgErrorPassword').hide().html(err.responseJSON[0]['password'][0]).slideDown();
                    }catch {
                        $('#rgErrorPassword').hide().html(err.responseJSON[0]['password'][0]).slideUp();
                    }
                }
            });
        });
        $('#fgbtn').click(function(){
            $('#fg').css('display','block');
    });
         $('#rgbtn').click(function(){
            $('#rg').css('display','block');
    });
    });
    </script>
</body>
</html>
