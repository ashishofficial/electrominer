<!DOCTYPE html>
<html>
<title>Dashboard Login</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('backend/css/main.css') }}" rel="stylesheet">
    <style>
        #error,#fgError 
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
<div id="divLoading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001; opacity: 0.8;display:none;">
    <p style="position: absolute; color: White; top: 40%; left: 45%;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/09b24e31234507.564a1d23c07b4.gif" height="100px"></p>
</div>
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
                <button type="button" style="float:right;" onclick="document.getElementById('myModal').style.display='block'" class="cancelbtn btn-info" id="fgbtn">Forgot Password ?</button>
                
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
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <script>
    // ajax loader display

    $(document).ajaxStart(function(){
    $("#divLoading").css("display", "block");
    });

    $(document).ajaxComplete(function(){
        $("#divLoading").css("display", "none");
    });


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
                    alert('Please check your email for new password');
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
        $('#fgbtn').click(function(){
        $('#fg').css('display','block');
    });
    });
    </script>
</body>
</html>
