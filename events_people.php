<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <title>Shop Item - Start Bootstrap Template</title>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">BoardFinder</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Events and people</a></li>
            <li><a href="#">Trade</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            session_start();

            if (isset($_SESSION['f_name'])) {
                echo "<li class=\"navbar-inverse\"><a href=\"Profile.php\">Welcome " . $_SESSION['f_name'] . "</a></li>";
                echo "<li><a href=\"/Board_Finder/logout.php\"><span class=\"glyphicon glyphicon-user\"></span> Logout</a></li>";
            } else {
                echo "<li><a href=\"#\" onclick=\"document.getElementById('id02').style.display='block'\" style=\"width:auto;\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li> <li><a href=\"#\" onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto;\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
            }

            ?>
        </ul>
    </div>
</nav>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <h1 class="my-4">Map</h1>
        <div class="checkbox">
            <label><input type="checkbox" onchange="" id="people_box"> People</label>
            <label><input type="checkbox" onchange="" id="events_box"> Events</label>
        </div>
        <!-- /.col-lg-3 -->
        <br>
        <div id="map" style="width: 100%; height: 500px" align="center"></div>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8ypmGKxQZ05VhGwocqkOcArO1A5fqzgM">
        </script>
        <script src="./Map.js"></script>
        <div class="col" style="position: relative;
             top: 10px;">
            <a href="#" class="btn-primary btn-lg btn-block">Create Event</a>
        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->
<div id="id01" class="modal">

    <form class="container modal-content animate" action="login.php" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="logo.png" alt="logo" class="avatar">
        </div>

        <div class="form-input">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

        </div>
        <div class="form-input">
            <button type="submit">Login</button>
        </div>

        <div class="col" style="background-color:#f1f1f1;margin-top:10px;">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                Cancel
            </button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>
<div id="id02" class="modal">

    <form class="container modal-content animate" action="signup.php" method="POST">

        <div class="form-input">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <label><b>First Name</b></label>
            <input type="text" placeholder="Enter Name" name="fname" required>
            <label><b>Second Name</b></label>
            <input type="text" placeholder="Enter Name" name="sname" required>
            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

        </div>
        <div class="form-input">
            <button type="submit">Sign Up</button>
        </div>

        <div class="col" style="background-color:#f1f1f1;margin-top:10px;">
            <button type="button" onclick="document.getElementById('id02').style.display='none'"
                    class="cancelbtn">
                Cancel
            </button>
        </div>
    </form>
</div>
<script>
    addEventListener("load", e => {
        if (window.location.search == "?login=true") {
            document.getElementById('id01').style.display = 'block';
        }
    })
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">

            Copyright &copy; BoardFinder 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
</body>

</html>