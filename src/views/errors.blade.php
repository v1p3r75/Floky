<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

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

        .traceback {
            width: 100%;
            height: 150px;
            margin: 50px 0;
            padding: 10px;
            background-color: #E9F8F9;
            overflow-y: auto;
        }

        .error a {

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

        .errs {

            width: 100%;
            min-height: 200px;
            margin: 50px 0;
            padding: 20px;
            background-color: white;
            color: rgba(0,0,0,0.7);
            scrollbar-width: 10px;
            scrollbar-color: white blue;
            border-radius: 10px;
            display: flex;
        }

        summary {
            margin: 25px 0;
            font-size: 1.2rem;
        }
    </style>

</head>

<body>
    <div id="page">
        <div class="header" style="display: flex; justify-content: space-between; padding: 8px">
            <h1 class="brands">Floky</h1>
            <h4 class="error"><a href="#" class="help">Docs</a></h4>
        </div>
        <div class="errs">
            <div style="width: 20%; margin-right: 20px; color:white">
                <img src="/sad-emoji.png" alt="wrong" style="width: 100%; height: 100%">
            </div>
            <div style="align-self: center">
                <h2 title="Exception Name">{{ $name }}</h2>
                <h3 title="Exception file">Message : {{ $message }}</h3>
                <h3 title="Exception Code">File : {{ $file }}</h3>
                <h3 title="Exception Message">Code : {{ $code }}</h3>
            </div>
        </div>
        <hr>
        <h3 class="tracebackTitle error"><a href="javascript:void(0)">Traceback</a></h3>
        <div class="tracebackContainer" style="margin: 30px 0;">
            <details>
                <summary class="trace-c">400</summary>
                <div class="traceback">
                    <h4 title="Exception Code">400</h4>
                </div>
            </details>
        </div>

        <script>
            let _y = document.querySelectorAll('.trace-c');
            _y[0] ? _y[0].click() : null;
        </script>
    </div>
</body>

</html>