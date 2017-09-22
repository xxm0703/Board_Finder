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

    <title>localhost</title>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <style>
        span.tag {
            border-radius: 5px;
            color: white;
            background-color: #333;
            padding: 5px;
            margin: 5px;
        }

        div.tagholder {
            margin: 10px;
            margin-left: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">BoardFinder</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="events_people.php">Events and people</a></li>
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
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <!-- resumt -->
            <div class="container">
                <div class="panel-heading resume-heading">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-xs-12 col-sm-4">
                                <figure>
                                    <?php
                                    if (isset($_SESSION['image']) && $_SESSION['image'] != null) {
                                        echo "<img class=\"img-circle img-responsive\" src = '{$_SESSION['image']}' >";
                                    } else {
                                        echo "<img class=\"img-circle img-responsive\" src = 'blank-profile.png' >";
                                    }
                                    ?>
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <ul class="list-group">
                                    <?php
                                    if (isset($_SESSION['f_name'])) {
                                        echo "<li class=\"list-group-item\"> " . $_SESSION['f_name'] . " " . $_SESSION['s_name'] . "</li>";
                                    } else {
                                        echo "<li class=\"list-group-item\"> No user </li>";
                                    }
                                    if (isset($_SESSION['e-mail'])) {
                                        echo "<li class=\"list-group-item\" ><i class=\"fa fa-envelope\" ></i> " . $_SESSION['e-mail'] . " </li >";
                                    } else {
                                        echo "<li class=\"list-group-item\"> No user </li>";
                                    }
                                    ?>
                                    <li class="list-group-item"> Software Engineer</li>
                                </ul>
                                <?php
                                if (!isset($_SESSION['image']) || $_SESSION['image'] == null) {
                                    echo "<form action = \"profile_picture.php\" method = \"POST\" >";
                                    echo "<input type = \"text\" name = \"image\" class=\"form-input\">";
                                    echo "<input type = \"submit\" class=\"btn btn-success\" >";
                                    echo "</form >";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4 style="display: inline-block">Game you are </h4>
                    <form action="add.php" method="POST">
                        <select class="form-control" name="addToDatabase" style="width: 100%;display: inline-block">
                            <option value="1">interested</option>
                            <option value="2">playing</option>
                            <option value="3">wanted</option>
                        </select>
                        <input type="text" name="game">
                        <input type="submit">
                    </form>
                </div>
                <script type="text/javascript">
                    function displayData(form) {
                        var val = $(form).serialize();
                        fetch(("show.php?" + val), {
                            credentials: "same-origin",
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },

                        })
                            .then(data => data.json())
                            .then(data2 => {
                                var e = $('#liked');
                                e.empty();
                                for (var a of data2) {
                                    console.log(a);
                                    e.append(`<span class='tag'>${a}</span>`);
                                }
                            })
                    }

                    addEventListener("load", e => {
                        if (window.location.search == "?login=true") {
                            document.getElementById('id01').style.display = 'block';
                        }
                    })


                </script>
                <div class="bs-callout bs-callout-danger">
                    <h4 style="display: inline-block">Show games you</h4>
                    <div style="display: inline-block">
                        <form id="inter">
                            <select class="form-control" name="base" style="width: 100%;display: inline-block">
                                <option>--choose--</option>
                                <option value="1">interested</option>
                                <option value="2">playing</option>
                                <option value="3">wanted</option>
                            </select>
                        </form>
                        <script>
                            $(document).ready(function () {
                                $('form[id="inter"]').change(function () {
                                    displayData(this);
                                });

                            });
                        </script>
                    </div>
                    <div class="tagholder" id="liked">
                    </div>
                </div>
            </div>
            <!-- resume -->
        </div>

        <div id="id01" class="modal">

            <form class="container modal-content animate" action="login.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                          title="Close Modal">&times;</span>
                    <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
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
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">
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
    </div>
</body>
</html>