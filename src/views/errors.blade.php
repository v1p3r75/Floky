<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $name }} - Something is wrong!</title>
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
        pre code.hljs{display:block;overflow-x:auto;padding:1em}code.hljs{padding:3px 5px}/*!
        */.hljs-comment,.hljs-meta{color:#565f89}.hljs-deletion,.hljs-doctag,.hljs-regexp,.hljs-selector-attr,.hljs-selector-class,.hljs-selector-id,.hljs-selector-pseudo,.hljs-tag,.hljs-template-tag,.hljs-variable.language_{color:#f7768e}.hljs-link,.hljs-literal,.hljs-number,.hljs-params,.hljs-template-variable,.hljs-type,.hljs-variable{color:#ff9e64}.hljs-attribute,.hljs-built_in{color:#e0af68}.hljs-keyword,.hljs-property,.hljs-subst,.hljs-title,.hljs-title.class_,.hljs-title.class_.inherited__,.hljs-title.function_{color:#7dcfff}.hljs-selector-tag{color:#73daca}.hljs-addition,.hljs-bullet,.hljs-quote,.hljs-string,.hljs-symbol{color:#9ece6a}.hljs-code,.hljs-formula,.hljs-section{color:#7aa2f7}.hljs-attr,.hljs-char.escape_,.hljs-keyword,.hljs-name,.hljs-operator{color:#bb9af7}.hljs-punctuation{color:#c0caf5}.hljs{background:#1a1b26;color:#9aa5ce}.hljs-emphasis{font-style:italic}.hljs-strong{font-weight:700}        
        </style>

</head>

<body>
    <div id="page">
        <div class="header" style="display: flex; justify-content: space-between; padding: 8px">
            <h1 class="brands" style="display:flex">
                <div><img src="/favicon.ico" alt="Favicon" style="margin-right:5px"></div>
                <div style="align-self:center">Floky</div>
            </h1>
            <h4 class="error"><a href="#" class="help">Docs</a></h4>
        </div>
        <div class="errs">
            <div style="width: 20%; margin-right: 20px; color:white">
                <img src="/.asserts/sad-emoji.png" alt="wrong" style="width: 100%; height: 100%">
            </div>
            <div style="align-self: center">
                <h2 title="Exception Name">{{ $name }}</h2>
                <h3 title="Exception file">Message : {{ $message }}</h3>
                <h3 title="Exception Code">
                    <a href="{{ $file }}" target="_blank" style="color: inherit">File : {{ $file . ':' . $line}}</a>
                </h3>
                <h3 title="Exception Message">Code : {{ $code }}</h3>
            </div>
        </div>
        <hr>
        <h3 class="tracebackTitle error"><a href="javascript:void(0)">Traceback</a></h3>
        <div class="tracebackContainer" style="margin: 30px 0;">
            @foreach($previews as $preview)
                <details>
                    <summary class="trace-c">{{ $preview->filename }}</summary>
                    <div>
                        <pre>
                            <code class="{{ 'hljs ' . $preview->language}}">
                                {!! $preview->value !!}
                            </code>
                        </pre>
                    </div>
                </details>
            @endforeach
        </div>

        <script>
            let traces = document.querySelectorAll('.trace-c');
            traces.forEach((e,i) => e.click())
        </script>
    </div>
</body>

</html>