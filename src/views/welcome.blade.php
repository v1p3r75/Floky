<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Floky | Welcome</title>
    <link rel="icon" href="/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #565f89;
            border-radius: 10px;
        }

        /* ::-webkit-scrollbar-thumb:hover{background: yellowgreen;} */

        body {
            font-family: "Montserrat", "Arial";
            padding: 0;
            margin: 0;
            color: white;
            overflow-y: hidden;
        }

        #page {
            position: relative;
            height: 100vh;
            padding: 10px 5%;
            background: #181823;
            overflow-y: scroll;
        }

        .d-none {
            display: none;
        }

        a {

            display: inline-block;
            text-transform: uppercase;
            color: #E9F8F9;
            text-decoration: none;
            border: 2px solid;
            background: transparent;
            padding: 10px 40px;
            font-size: 14px;
            font-weight: 700;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin: 5rem 0;
        }

        .feature {
            width: 48%;
            min-height: 150px;
            padding: 20px;
            background-color: white;
            color: rgba(0, 0, 0, 0.7);
            scrollbar-width: 10px;
            scrollbar-color: white blue;
            border-radius: 10px;
            gap: 30px;
        }

        .feature div {
            align-self: center;
        }

        .feature i {
            font-size: 2rem;
        }

        .feature h3 {
            margin: 20px 0 0 0;
        }

        @media only screen and (max-width: 767px) {
            .feature {
                width: 100%;
            }
        }
    </style>

</head>

<body>
    <div id="page">
        <div class="header" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <h1 class="brands">Floky</h1>
            <h4><a href="https://floky-docs.vercel.app/" target="_blank" class="help">Get Started</a></h4>
        </div>
        <div class="features">
            <div class="feature">
                <div><i class="icon">🚀</i></div>
                <div>
                    <h3>Fast and Efficient</h3>
                    <p>Our framework is designed for speed and efficiency in web development.</p>
                </div>
            </div>
            <div class="feature">
                <div><i class="icon">🎨</i></div>
                <div>
                    <h3>Flexible Design</h3>
                    <p>Create beautiful and flexible web applications with ease.</p>
                </div>
            </div>
            <div class="feature">
                <div>
                    <i class="icon">🧩</i>
                </div>
                <div>
                    <h3>Modular Architecture</h3>
                    <p>Build applications with a clean and modular code structure.</p>
                </div>
            </div>
            <div class="feature">
                <div><i class="icon">🌱</i></div>
                <div>
                    <h3>Lightweight</h3>
                    <p>Our framework is lightweight and optimized for smaller projects, making it perfect for quick and efficient development.</p>
                </div>
            </div>
        </div>
        <footer>
            <p style="font-size: 13px;"><i>Copyright &copy; {{ date('Y') }} - Floky<i></p>
        </footer>
    </div>
</body>

</html>