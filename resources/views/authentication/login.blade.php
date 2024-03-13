<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login</title>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@700&family=Figtree:wght@700&display=swap"
        rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            width: 100vw;
            height: 100vh;
            background-color: #24242c;
        }

        .container {
            width: 50%;
            height: 100%;
            background-color: #24242c;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .pic {
            width: 50%;
            height: 100%;
            overflow: hidden;
            background-image: url("https://4kwallpapers.com/images/wallpapers/dark-blue-pink-2560x2560-12661.jpg");
            background-size: cover;
            background-position: center;
        }

        /* .pic2 {
    width: 100%;
    height: 15px;
    position: absolute;
    display: none;
    top: 0;
    background-image: url("https://4kwallpapers.com/images/wallpapers/dark-blue-pink-2560x2560-12661.jpg");
    background-size: cover;
    background-position: center;
} */

        .inp {
            width: 350px;
            height: 50px;
            max-height: 50px;
            min-height: 50px;
            display: flex;
            align-items: center;
            position: relative;
        }

        label {
            position: absolute;
            left: 20px;
            color: #777780;
            height: 20px;
            transform: translateY(2.5px);
            padding-left: 5px;
            cursor: text;
            padding-right: 5px;
            transition: .2s;
            font-family: Arial, Helvetica, sans-serif;
        }

        input {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: 2px solid #494954;
            border-radius: 10px;
            outline: none;
            transition: .4s;
            color: #fff;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 15px;
        }

        input:focus {
            border: 2px solid #1f1fff;
            box-shadow: #6767ff 0px 1px 1px, #6767ff 0px 0px 0px 1px;
        }

        input:focus+label {
            left: 20px;
            transform: translateY(-22px);
            font-size: 12px;
            background-color: #24242c;
        }

        .up {
            left: 20px;
            transform: translateY(-22px);
            font-size: 12px;
            background-color: #24242c;
        }

        button {
            width: 350px;
            height: 50px;
            min-height: 50px;
            max-height: 50px;
            background-color: #2020db;
            border: 2px solid #1f1fff;
            border-radius: 50px;
            outline: none;
            transition: .4s;
            color: #fff;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 15px;
            cursor: pointer;
            font-family: 'Figtree', sans-serif;
        }

        button:hover {
            background-color: #1717c2;
            border: 2px solid #1717c2;
        }

        h1 {
            font-family: 'Be Vietnam Pro', sans-serif;
            font-family: 'Figtree', sans-serif;
            color: #fff;
            margin-bottom: 20px;
        }

        a {
            color: #bbbbbb;
            text-decoration: none;
            font-size: 12px;
            font-family: 'Figtree', sans-serif;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            width: 70px;
            border-radius: 10px;
            border: 1px solid #494954;
        }

        @media only screen and (max-width: 750px) {
            .pic {
                display: none;
            }

            /* .pic2 {
        display: block;
    } */

            .container {
                width: 100%;
            }
        }

        @media only screen and (max-height: 450px) {
            .pic {
                display: none;
            }

            .container {
                width: 100%;
            }

            body {
                padding-bottom: 10px;
                overflow: scroll;
                height: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="pic2"></div>
            <img alt=""
                src="https://store-images.s-microsoft.com/image/apps.28471.14139628370441750.28b315c6-e587-4ac5-8b42-4388ed4a2f09.d5ba0d3b-63ca-4d9d-ba00-47fcfa6b02e1">
            <h1>Sign In</h1>
            <div class="inp" style="margin-bottom: 10px">
                <input id="username" name="username" type="text">
                <label for="Username" onclick="focusinp('usr')">Username</label>
            </div>
            <div class="inp" style="margin-bottom: 10px">
                <input id="password" name="password" type="password">
                <label for="Password" onclick="focusinp('pass')">Password</label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

    <div class="pic">
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = document.querySelectorAll(".inp input");

        inputs.forEach(input => {
            input.addEventListener("input", function() {
                const label = this.nextElementSibling;
                label.classList.toggle("up", this.value.trim() !== "");
            });
        });
    });

    function focusinp(inp) {
        if (inp == 'usr') {
            document.getElementById("username").focus();
        } else if (inp == 'pass') {
            document.getElementById("password").focus();
        } else {
            document.getElementById("username").focus();
        }
    }
</script>

</html>
