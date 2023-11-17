<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Quicksand');

        * {
            font-family: 'quicksand', Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #fff;
        }

        .form-modal {
            position: relative;
            width: 450px;
            height: auto;
            margin-top: 4em;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1)
        }

        .form-modal button {
            cursor: pointer;
            position: relative;
            text-transform: capitalize;
            font-size: 1em;
            z-index: 2;
            outline: none;
            background: #fff;
            transition: 0.2s;
        }

        .form-modal .btn {
            border-radius: 20px;
            border: none;
            font-weight: bold;
            font-size: 1.2em;
            padding: 0.8em 1em 0.8em 1em !important;
            transition: 0.5s;
            border: 1px solid #ebebeb;
            margin-bottom: 0.5em;
            margin-top: 0.5em;
        }

        .form-modal .login,
        .form-modal .signup {
            background: #57b846;
            color: #fff;
        }

        .form-modal .login:hover,
        .form-modal .signup:hover {
            background: #222;
        }

        .form-toggle {
            position: relative;
            width: 100%;
            height: auto;
        }

        .form-toggle button {
            width: 50%;
            float: left;
            padding: 1.5em;
            margin-bottom: 1.5em;
            border: none;
            transition: 0.2s;
            font-size: 1.1em;
            font-weight: bold;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
        }

        .form-toggle button:nth-child(1) {
            border-bottom-right-radius: 20px;
        }

        .form-toggle button:nth-child(2) {
            border-bottom-left-radius: 20px;
        }

        #login-toggle {
            background: #57b846;
            color: #ffff;
        }

        .form-modal form {
            position: relative;
            width: 90%;
            height: auto;
            left: 50%;
            transform: translateX(-50%);
        }

        #login-form,
        #signup-form {
            position: relative;
            width: 100%;
            height: auto;
            padding-bottom: 1em;
        }

        #signup-form {
            display: none;
        }


        #login-form button,
        #signup-form button {
            width: 100%;
            margin-top: 0.5em;
            padding: 0.6em;
        }

        .form-modal input {
            position: relative;
            width: 100%;
            font-size: 1em;
            padding: 1.2em 1.7em 1.2em 1.7em;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            border-radius: 20px;
            border: none;
            background: #ebebeb;
            outline: none;
            font-weight: bold;
            transition: 0.4s;
        }

        .form-modal input:focus,
        .form-modal input:active {
            transform: scaleX(1.02);
        }

        .form-modal input::-webkit-input-placeholder {
            color: #222;
        }


        .form-modal p {
            font-size: 16px;
            font-weight: bold;
        }

        .form-modal p a {
            color: #57b846;
            text-decoration: none;
            transition: 0.2s;
        }

        .form-modal p a:hover {
            color: #222;
        }


        .form-modal i {
            position: absolute;
            left: 10%;
            top: 50%;
            transform: translateX(-10%) translateY(-50%);
        }

        .fa-google {
            color: #dd4b39;
        }

        .fa-linkedin {
            color: #3b5998;
        }

        .fa-windows {
            color: #0072c6;
        }

        .-box-sd-effect:hover {
            box-shadow: 0 4px 8px hsla(210, 2%, 84%, .2);
        }

        @media only screen and (max-width:500px) {
            .form-modal {
                width: 100%;
            }
        }

        @media only screen and (max-width:400px) {
            i {
                display: none !important;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php if (session()->getFlashdata('success')) : ?>
        <!-- <div class="alert alert-success" role="alert">
        </div> -->
        <?= session()->getFlashdata('success') ?>

    <?php endif; ?>

    <div class="form-modal">

        <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">log in</button>
            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
        </div>

        <div id="login-form">
            <!-- TODO:Login -->
            <p style="margin-left: 15px;">Sistem Pakar Sederhana Deteksi Kelenjar Getah Bening Terinfeksi Atau Kanker </p>
            <form action="/login" method="POST">
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="Enter password" />
                <button type="submit" class="btn login">login</button>
                <p><a href="javascript:void(0)">Forgot Password</a></p>
                <hr />
                <?php
                $session = session();
                if ($session->getFlashdata('error')) {
                    echo ' <div class="alert alert-danger" role="alert">' . $session->getFlashdata('error') . '</div>';
                }
                ?>
            </form>
        </div>

        <div id="signup-form">
            <!-- TODO:Register -->
            <p style="margin-left: 15px;">Sistem Pakar Sederhana Deteksi Kelenjar Getah Bening Terinfeksi Atau Kanker </p>
            <form action="/register" method="POST">
                <?= csrf_field(); ?>
                <input name="nama" type="text" placeholder="Nama Lengkap" />
                <input name="username" type="text" placeholder="Choose username" />
                <input name="password" type="password" placeholder="Create password" />
                <button type="submit" class="btn signup">create account</button>
                <hr />

            </form>
        </div>

    </div>

    <script>
        function toggleSignup() {
            document.getElementById("login-toggle").style.backgroundColor = "#fff";
            document.getElementById("login-toggle").style.color = "#222";
            document.getElementById("signup-toggle").style.backgroundColor = "#57b846";
            document.getElementById("signup-toggle").style.color = "#fff";
            document.getElementById("login-form").style.display = "none";
            document.getElementById("signup-form").style.display = "block";
        }

        function toggleLogin() {
            document.getElementById("login-toggle").style.backgroundColor = "#57B846";
            document.getElementById("login-toggle").style.color = "#fff";
            document.getElementById("signup-toggle").style.backgroundColor = "#fff";
            document.getElementById("signup-toggle").style.color = "#222";
            document.getElementById("signup-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>