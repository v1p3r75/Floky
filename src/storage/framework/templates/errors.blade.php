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
        ::-webkit-scrollbar {width: 5px;}
        ::-webkit-scrollbar-track {border-radius: 5px;}
        ::-webkit-scrollbar-thumb {background: #565f89; border-radius: 10px;}
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
            color: rgba(0, 0, 0, 0.7);
            scrollbar-width: 10px;
            scrollbar-color: white blue;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            overflow-x: auto;
        }

        summary {
            margin: 25px 0;
            font-size: 1.2rem;
        }

        pre code.hljs {
            display: block;
            overflow-x: auto;
            padding: 1em
        }

        code.hljs {
            padding: 3px 5px
        }

        /*!
        */
        .hljs-comment,
        .hljs-meta {
            color: #565f89
        }

        .hljs-deletion,
        .hljs-doctag,
        .hljs-regexp,
        .hljs-selector-attr,
        .hljs-selector-class,
        .hljs-selector-id,
        .hljs-selector-pseudo,
        .hljs-tag,
        .hljs-template-tag,
        .hljs-variable.language_ {
            color: #f7768e
        }

        .hljs-link,
        .hljs-literal,
        .hljs-number,
        .hljs-params,
        .hljs-template-variable,
        .hljs-type,
        .hljs-variable {
            color: #ff9e64
        }

        .hljs-attribute,
        .hljs-built_in {
            color: #e0af68
        }

        .hljs-keyword,
        .hljs-property,
        .hljs-subst,
        .hljs-title,
        .hljs-title.class_,
        .hljs-title.class_.inherited__,
        .hljs-title.function_ {
            color: #7dcfff
        }

        .hljs-selector-tag {
            color: #73daca
        }

        .hljs-addition,
        .hljs-bullet,
        .hljs-quote,
        .hljs-string,
        .hljs-symbol {
            color: #9ece6a
        }

        .hljs-code,
        .hljs-formula,
        .hljs-section {
            color: #7aa2f7
        }

        .hljs-attr,
        .hljs-char.escape_,
        .hljs-keyword,
        .hljs-name,
        .hljs-operator {
            color: #bb9af7
        }

        .hljs-punctuation {
            color: #c0caf5
        }

        .hljs {
            background: #1a1b26;
            color: #9aa5ce
        }

        .hljs-emphasis {
            font-style: italic
        }

        .hljs-strong {
            font-weight: 700
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
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 256 256" xml:space="preserve">

                    <defs>
                    </defs>
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                        <circle cx="45" cy="45" r="43" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(237,180,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) " />
                        <path d="M 20.146 35.908 c -0.469 0.869 -0.877 1.8 -1.213 2.784 c -2.457 7.192 -0.112 14.503 5.236 16.33 c 5.349 1.827 11.676 -2.522 14.133 -9.714 c 2.438 -7.136 0.149 -14.389 -5.112 -16.286" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 38.264 45.601 c -4.012 2.197 -7.762 3.145 -11.113 3.167 c -3.899 0.026 -7.258 -1.199 -9.86 -3.167 C 20.08 55.416 31.288 58.434 38.264 45.601 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,152,206); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 69.854 35.908 c 0.469 0.869 0.877 1.8 1.213 2.784 c 2.457 7.192 0.112 14.503 -5.236 16.33 c -5.349 1.827 -11.676 -2.522 -14.133 -9.714 c -2.438 -7.136 -0.149 -14.389 5.112 -16.286" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 52.291 45.601 c 4.012 2.197 7.762 3.145 11.113 3.167 c 3.899 0.026 7.258 -1.199 9.86 -3.167 C 70.474 55.416 59.267 58.434 52.291 45.601 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,152,206); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 4 C 22.393 4 4 22.393 4 45 s 18.393 41 41 41 s 41 -18.393 41 -41 S 67.607 4 45 4 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 28 74.614 c 1.847 -2.687 4.29 -4.966 7.187 -6.673 c 2.891 -1.696 6.315 -2.747 9.813 -2.756 c 3.498 0.004 6.924 1.055 9.815 2.751 c 2.899 1.707 5.342 3.987 7.185 6.678 c -2.936 -1.436 -5.698 -2.842 -8.521 -3.831 c -2.812 -1.002 -5.643 -1.582 -8.479 -1.6 c -2.836 0.012 -5.669 0.593 -8.481 1.595 C 33.695 71.766 30.933 73.175 28 74.614 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <circle cx="31.13" cy="41" r="4.5" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) " />
                        <circle cx="58.87" cy="41" r="4.5" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) " />
                        <path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 4 C 22.393 4 4 22.393 4 45 s 18.393 41 41 41 s 41 -18.393 41 -41 S 67.607 4 45 4 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 10.424 35.458 c 3.221 -0.367 6.279 -0.669 9.174 -1.343 c 2.892 -0.655 5.589 -1.657 8.017 -3.109 c 2.415 -1.474 4.558 -3.39 6.487 -5.642 c 1.945 -2.246 3.642 -4.808 5.474 -7.484 c -0.262 3.227 -1.251 6.392 -2.898 9.288 c -1.648 2.885 -4.045 5.478 -6.999 7.262 c -2.959 1.775 -6.37 2.684 -9.69 2.794 C 16.66 37.328 13.401 36.727 10.424 35.458 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 26.717 57.444 c -1.084 0 -2.156 -0.176 -3.194 -0.53 c -6.384 -2.181 -9.292 -10.646 -6.482 -18.869 c 0.366 -1.07 0.818 -2.108 1.345 -3.086 l 3.521 1.897 c -0.423 0.785 -0.787 1.62 -1.082 2.482 c -2.096 6.136 -0.306 12.322 3.99 13.79 c 1.974 0.676 4.237 0.238 6.372 -1.23 c 2.317 -1.593 4.172 -4.163 5.222 -7.237 c 2.071 -6.064 0.323 -12.236 -3.898 -13.758 l 1.356 -3.763 c 6.367 2.296 9.146 10.56 6.327 18.814 c -1.326 3.882 -3.72 7.165 -6.742 9.241 C 31.288 56.683 28.976 57.444 26.717 57.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 79.576 35.458 c -2.977 1.27 -6.236 1.87 -9.566 1.767 c -3.32 -0.11 -6.731 -1.02 -9.69 -2.794 c -2.954 -1.784 -5.351 -4.378 -6.999 -7.262 c -1.647 -2.896 -2.636 -6.061 -2.898 -9.288 c 1.833 2.676 3.529 5.238 5.474 7.484 c 1.929 2.252 4.072 4.168 6.487 5.642 c 2.428 1.452 5.125 2.454 8.017 3.109 C 73.297 34.789 76.355 35.091 79.576 35.458 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 63.343 57.432 c -5.529 0 -11.179 -4.573 -13.537 -11.477 c -2.819 -8.254 -0.041 -16.518 6.326 -18.814 l 1.357 3.763 c -4.222 1.522 -5.97 7.694 -3.898 13.758 c 2.097 6.137 7.302 9.932 11.594 8.467 c 4.296 -1.468 6.086 -7.654 3.99 -13.791 c -0.294 -0.86 -0.657 -1.694 -1.082 -2.481 l 3.521 -1.898 c 0.528 0.98 0.981 2.019 1.346 3.086 c 2.809 8.224 -0.1 16.688 -6.482 18.869 C 65.453 57.264 64.399 57.432 63.343 57.432 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 53.367 62.589 c -2.56 0 -4.643 -2.083 -4.643 -4.643 c 0 -3.259 2.614 -6.272 4.343 -8.266 l 0.189 -0.218 c 0.056 -0.064 0.166 -0.064 0.221 0 l 0.189 0.218 c 1.73 1.994 4.343 5.007 4.343 8.266 C 58.01 60.506 55.927 62.589 53.367 62.589 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,152,206); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 53.367 64.089 c -3.387 0 -6.143 -2.756 -6.143 -6.143 c 0 -3.819 2.834 -7.087 4.709 -9.248 l 0.188 -0.218 c 0.622 -0.723 1.867 -0.722 2.49 0.001 l 0.188 0.217 c 1.877 2.163 4.71 5.43 4.71 9.248 C 59.51 61.333 56.754 64.089 53.367 64.089 z M 53.367 51.636 c -1.474 1.76 -3.143 4.056 -3.143 6.311 c 0 1.732 1.41 3.143 3.143 3.143 s 3.143 -1.41 3.143 -3.143 C 56.51 55.691 54.839 53.395 53.367 51.636 z M 52.344 50.443 c 0 0.001 0.001 0.002 0.001 0.002 L 52.344 50.443 z M 54.391 50.442 l -0.001 0.002 C 54.39 50.443 54.391 50.443 54.391 50.442 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                </svg>
            </div>
            <div style="align-self: center; width: 78%">
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
            traces.forEach((e, i) => e.click())
        </script>
    </div>
</body>

</html>