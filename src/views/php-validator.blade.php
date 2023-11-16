<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Floky | Test PHP Validator</title>
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
            width: 45%;
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="text-light">
    <div id="page">
        <div class="header" style="display: flex; justify-content: space-between; padding: 8px">
            <h1 class="brands">Floky</h1>
            <h4><a href="https://github.com/v1p3r75/Floky" target="_blank" class="help">Get Started</a></h4>
        </div>
        <div class="container">
            <div>
                <h2>PHP Validator Test Page</h2>
            </div>
            <form method="POST" action="{{ route('validator.post') }}">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <footer>
            <p style="font-size: 13px;"><i>Copyright &copy; {{ date('Y') }} - Floky<i></p>
        </footer>
    </div>
</body>

</html>