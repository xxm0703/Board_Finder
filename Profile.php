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

    <title>Shop Item - Start Bootstrap Template</title>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <style>
        span.tag{
                border-radius: 5px;
                color:white;
                background-color: #333;
                padding: 5px;
                margin: 5px;
        }
        div.tagholder{
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Events and people</a></li>
            <li><a href="#">Trade</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <!-- resumt -->
            <div class="panel panel-default">
                <div class="panel-heading resume-heading">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-xs-12 col-sm-4">
                                <figure>
                                    <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                                </figure>
                                <div    class="row">
                                    <div class="col-xs-12 social-btns">
                                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                            <a href="#" class="btn btn-social btn-block btn-google">
                                                <i class="fa fa-google"></i> </a>
                                        </div>
                                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                            <a href="#" class="btn btn-social btn-block btn-facebook">
                                                <i class="fa fa-facebook"></i> </a>
                                        </div>
                                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                            <a href="#" class="btn btn-social btn-block btn-twitter">
                                                <i class="fa fa-twitter"></i> </a>
                                        </div>
                                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                            <a href="#" class="btn btn-social btn-block btn-linkedin">
                                                <i class="fa fa-linkedin"></i> </a>
                                        </div>
                                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                            <a href="#" class="btn btn-social btn-block btn-github">
                                                <i class="fa fa-github"></i> </a>
                                        </div>
                                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                            <a href="#" class="btn btn-social btn-block btn-stackoverflow">
                                                <i class="fa fa-stack-overflow"></i> </a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <ul class="list-group">
                                    <li class="list-group-item">John Doe</li>
                                    <li class="list-group-item">Software Engineer</li>
                                    <li class="list-group-item">Google Inc. </li>
                                    <li class="list-group-item"><i class="fa fa-phone"></i> 000-000-0000 </li>
                                    <li class="list-group-item"><i class="fa fa-envelope"></i> john@example.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Games you Own:</h4>
                    <div class="tagholder">
                    <?php
                        $url = 'interested.php';

                        $options = array(
                            'http' => array(
                                'method'  => 'POST'
                            )
                        );
                        $context  = stream_context_create($options);
                        $result = file_get_contents($url);
                        $array =  json_decode($result);

                        
                        foreach ($array as $key => $value){
                            echo "<span class='tag'>" . $value . "</span>";
                        }
                    ?>
                    </div>
                    <form action="/add.php" method="POST">
                        <input type="text" name="game">
                        <input type="hidden" name="addToDatabase" value="Owned">
                        <input type="submit">
                    </form>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Games you Like</h4>
                    <form action="/add.php" method="POST">
                        <input type="text" name="game">
                        <input type="hidden" name="addToDatabase" value="Liked">
                        <input type="submit">
                    </form>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Games you want to buy</h4>
                    <form action="/add.php" method="POST">
                        <input type="text" name="game">
                        <input type="hidden" name="addToDatabase" value="Wanted">
                        <input type="submit">
                    </form>
                </div>

                <div class="bs-callout bs-callout-danger">
                    <h4>Education</h4>
                    <table class="table table-striped table-responsive ">
                        <thead>
                        <tr>
                            <th>Degree</th>
                            <th>Graduation Year</th>
                            <th>CGPA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Masters in Computer Science and Engineering</td>
                            <td>2014</td>
                            <td> 3.50 </td>
                        </tr>
                        <tr>
                            <td>BSc. in Computer Science and Engineering</td>
                            <td>2011</td>
                            <td> 3.25 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- resume -->
    </div>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <form>
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me
                </form>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</div>
</body>
</html>