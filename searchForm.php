<html>

<head>
    <title>Design search Button</title>
    <style>
        .button_box2 {
            margin: 100px auto;
            width: 30%;
            height: 40%;
        }

        /*-------------------------------------*/
        .cf:before, .cf:after {
            content: "";
            display: table;
        }

        .cf:after {
            clear: both;
        }

        .cf {
            zoom: 1;
        }

        /*-------------------------------------*/
        body {
            background-color: #4C5A65;

        }

        h3 {
            color: white;
        }

        .form-wrapper-2 {
            width: 330px;
            padding: 15px;
            background: #555;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
        }

        .form-wrapper-2 input {
            width: 210px;
            height: 20px;
            padding: 10px 5px;
            float: left;
            margin-top: 10px;
            font: bold 15px 'Raleway', sans-serif;
            border: 0;
            background: #eee;
            -moz-border-radius: 3px 0 0 3px;
            -webkit-border-radius: 3px 0 0 3px;
            border-radius: 3px 0 0 3px;
        }

        .form-wrapper-2 input:focus {
            outline: 0;
            background: #fff;
            -moz-box-shadow: 0 0 2px rgba(0, 0, 0, .8) inset;
            -webkit-box-shadow: 0 0 2px rgba(0, 0, 0, .8) inset;
            box-shadow: 0 0 2px rgba(0, 0, 0, .8) inset;
        }

        .form-wrapper-2 input::-webkit-input-placeholder {
            color: #999;
            font-weight: normal;
            font-style: italic;
        }

        .form-wrapper-2 input:-moz-placeholder {
            color: #999;
            font-weight: normal;
            font-style: italic;
        }

        .form-wrapper-2 input:-ms-input-placeholder {
            color: #999;
            font-weight: normal;
            font-style: italic;
        }

        .form-wrapper-2 button {
            overflow: visible;
            position: relative;
            float: right;
            border: 0;
            padding: 0;
            cursor: pointer;
            height: 40px;
            width: 110px;
            font: bold 15px/40px 'Raleway', sans-serif;
            color: #fff;
            text-transform: uppercase;
            background: #D88F3C;
            -moz-border-radius: 0 3px 3px 0;
            -webkit-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
        }

        .form-wrapper-2 button:hover {
            background: #FA8807;
        }

        .form-wrapper-2 button:active,
        .form-wrapper-2 button:focus {
            background: #c42f2f;
        }

        .form-wrapper-2 button:before {
            content: '';
            position: absolute;
            border-width: 8px 8px 8px 0;
            border-style: solid solid solid none;
            border-color: transparent #D88F3C transparent;
            top: 12px;
            left: -6px;
        }

        .form-wrapper-2 button:hover:before {
            border-right-color: #FA8807;
        }

        .form-wrapper-2 button:focus:before {
            border-right-color: #c42f2f;
        }

        .form-wrapper-2 button::-moz-focus-inner {
            border: 0;
            padding: 0;
        }
    </style>
</head>

<body>
<!-- search form 6 -->
<div class="button_box2">
    <h3>Get user Data By Email</h3>
    <form action="getApiData.php" method="post" class="form-wrapper-2 cf">
        <input name="userEmail" type="text" placeholder="Search For user By Email" required>
        <button type="submit">Search</button>
    </form>
</div>

</body>
</html>