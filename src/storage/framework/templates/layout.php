<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Something is wrong!</title>
    <link rel="icon" href="/favicon.ico"/>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 560px;
            width: 100%;
            padding-left: 160px;
            line-height: 1.1;
        }

        .notfound .notfound-404 {
            position: absolute;
            left: 0;
            top: 0;
            display: inline-block;
            width: 140px;
            height: 140px;
            background-size: cover;
        }

        .notfound .notfound-404:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-transform: scale(2.4);
            -ms-transform: scale(2.4);
            transform: scale(2.4);
            border-radius: 50%;
            background-color: #f2f5f8;
            z-index: -1;
        }

        .notfound h1 {
            font-family: 'Nunito', sans-serif;
            font-size: 65px;
            font-weight: 700;
            margin-top: 0px;
            margin-bottom: 10px;
            color: #151723;
            text-transform: uppercase;
        }

        .notfound h2 {
            font-family: 'Nunito', sans-serif;
            font-size: 21px;
            font-weight: 400;
            margin: 0;
            text-transform: uppercase;
            color: #151723;
        }

        .notfound p {
            font-family: 'Nunito', sans-serif;
            color: #999fa5;
            font-weight: 400;
        }

        .notfound a {
            font-family: 'Nunito', sans-serif;
            display: inline-block;
            font-weight: 700;
            border-radius: 40px;
            text-decoration: none;
            color: #388dbc;
        }

        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                width: 110px;
                height: 110px;
            }

            .notfound {
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 110px;
            }
        }
    </style>

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 256 256" xml:space="preserve"><g transform="translate(1.41 1.41) scale(2.81 2.81)"><path d="M45 90C20.19 90 0 69.81 0 45 0 20.19 20.19 0 45 0c24.81 0 45 20.19 45 45C90 69.81 69.81 90 45 90zM45 4C22.39 4 4 22.39 4 45s18.39 41 41 41s41-18.39 41-41S67.61 4 45 4z" style="fill:#000" transform="matrix(1 0 0 1 0 0)"/><circle cx="30.34" cy="33.27" r="5.86" style="fill:#000" transform="matrix(1 0 0 1 0 0)"/><circle cx="59.66" cy="33.27" r="5.86" style="fill:#000" transform="matrix(1 0 0 1 0 0)"/><path d="M72.18 65.49c-0.44 0-0.89-0.15-1.26-0.45c-7.3-5.96-16.5-9.24-25.92-9.24c-9.42 0-18.62 3.28-25.92 9.24c-0.85 0.7-2.12 0.57-2.81-0.28c-0.7-0.86-0.57-2.12 0.28-2.81C24.56 55.4 34.66 51.8 45 51.8c10.34 0 20.44 3.6 28.45 10.15c0.85 0.7 0.98 1.96 0.28 2.81C73.34 65.24 72.76 65.49 72.18 65.49z" style="fill:#000" transform="matrix(1 0 0 1 0 0)"/></g></svg>
            </div>
            <h1>@yield('code')</h1>
            <h2>@yield('title')</h2>
            <p>@yield('message')</p>
            <a href={{ App\Providers\AppServiceProvider::HOME }}>Back to homepage</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>