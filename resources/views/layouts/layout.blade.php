<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *{
            margin: 0;
        }
        body{
            font-family: "Roboto", sans-serif;
        }
    .top-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px 0;
    }

    .navbar {
        display: flex;
        justify-content: center;
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    .menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .menu li {
        margin-right: 20px;
    }

    .menu li:last-child {
        margin-right: 0;
    }

    .menu li a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .body-content {
        padding: 20px 0;
        /* background-color: #f0f0f0; */
    }

    .container .body-content {
        text-align: center;
    }

    /* Adjusting form styles */
    .profile-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 500px;
    margin: 0 auto;
    text-align: left;
    }

    .profile-form .form-group {
        margin-bottom: 20px;
    }

    .profile-form label {
        display: block;
        margin-bottom: 5px;
    }

    .profile-form input {
        width: 93%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .profile-form button {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .profile-form button:hover {
        background-color: #0056b3;
    }

    div.error {
        color: red;
        font-weight: 600;
        margin-top: 6px;
    }

    h2.profile-title{
        text-align:center;
        margin-bottom: 30px;
    }

    .alert {
        padding: 15px;
        margin-top: 20px;
        background-color: #d4edda;
        border: 1px solid #0dc337;
        color: #155724;
        border-radius: 5px;
        position: relative;
    }

    .alert-error {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.wrapper{
    width: 100%;
    display: flex;
}

.post {
    margin-bottom: 40px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.post img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.post h2 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 18px;
}

.post p {
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 26px;
}

.sidebar {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
}

.sidebar h2{
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 18px;
}

.sidebar ul{
    padding-left: 0;
}

.sidebar ul li{
    list-style-type: none;
    padding: 10px;
    position: relative;
}
.sidebar ul li a{
    display: block;
    color: #747474;
    text-decoration: none;
    font-size: 14px;
}

.read-more{
    text-align: right;
    float: right;
    padding: 5px 10px;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    color: #747474;
    font-size: 13px;
}

.read-more:hover{
    background: #ccc;
}

.create-button {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px; /* Add some space between the button and other content */
}

.create-button:hover {
  background-color: #0056b3;
}

@media (min-width: 768px) {
    

    .post {
        flex-basis: 70%;
    }

    .sidebar {
        flex-basis: 25%;
        margin-left: 20px;
    }
}

@media (max-width: 767px) {
    .container {
        flex-direction: column;
    }

    .post,
    .sidebar {
        width: 100%;
        margin-left: 0;
    }
} 
    </style>
</head>

<body>

    <header class="top-header">
        <nav class="navbar">
            <div class="container">
                <ul class="menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('post.index') }}">List New Post</a></li>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="body-content">
        <div class="container">
            @session("success")
                <div class="alert" id="success-alert">
                    {{ session("success") }}
                </div>
            @endsession
            
            @yield("content")
        </div>
    </div>

</body>

</html>