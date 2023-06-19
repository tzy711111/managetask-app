<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="https://www.wpdcpa.com/wp-content/uploads/2019/12/512x512-2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        /* Body styles*/
        body{
            display: flex; 
            flex-direction: column; 
            min-height: 100vh;
        }

        body, h1, h2, h3, h4, h5, h6 {
        font-family: "Karma", serif
        }

        /* Cover style*/
        img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Table styles*/
        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        tr:hover {
            background-color: #F7F7F7;
        }

        .w3-table td {
        word-break: break-all;
        }

         /*Button styles*/
        .button {
        border: none;
        color: #fff;
        padding: 6px 16px;
        border-radius: 4px;
        font-size: 14px;
        }

        .edit-button {
        background: linear-gradient(to right, #4CAF50, #1B5E20);
        margin-right: 10px;
        }

        .edit-button:hover {
        background: linear-gradient(to right, #1B5E20, #004D40);
        }

        .delete-button {
        background: linear-gradient(to right, #FF0000, #B71C1C);
        }

        .delete-button:hover {
        background: linear-gradient(to right, #B71C1C, #880E4F);
        }

        .back-button {
            background: linear-gradient(to right, #757575, #424242);
            margin-right: 10px;
        }

        .back-button:hover {
            background: linear-gradient(to right, #424242, #212121);
        }

        .save-button {
            background: linear-gradient(to right, #2196F3, #0D47A1);
        }

        .save-button:hover {
            background: linear-gradient(to right, #0D47A1, #1565C0);
        }


        /* Styles applied when the screen width is 768px or less */
        @media screen and (max-width: 768px) {
        .button {
        border: none;
        color: #fff;
        border-radius: 4px;
        margin-right: 1px;
        }  

        .button-text {
            display: none;
        }
        }

         /* Styles applied when the screen width is 769px or more */
        @media screen and (min-width: 769px) {
            .button i {
                display: none;
            }
        }

    </style>

     <!-- Success message will be displayed if task is added/updated/deleted successfully -->
    @if(session('success_message'))
    <script>
        alert('{{ session('success_message') }}');
    </script>
    @endif
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <div class="w3-bar w3-white">
                <!--Logo-->
                <a href="{{ url('/') }}" class="w3-bar-item w3-button"><b>MY TASKS</b></a>
            </div>
        </div>
    </div>

    @yield('header')

    <div class="container" style="flex-grow: 1;">
        @yield('content')
    </div>

     <!--Footer-->
    <footer class="w3-container w3-light-gray w3-center w3-margin-top" style="flex-shrink: 0;">
        <p>Developed by</p>
        <p><b>TAN ZHI YANG</b></p>
    </footer>

</body>

</html>