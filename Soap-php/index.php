<!DOCTYPE html>
<html>
<head>
    <title>NTA Trincity</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="navbar navbar-default topnav">
        <div class="container topnav">
            <ul class="nav navbar-nav navbar-left">
                <li role="presentation" class="active">
                    <a href="http://localhost:52168/index.aspx">home</a>
                </li>

                <li role="presentation">
                    <a href="">View Courses</a>
                </li>
                <li>
                    <a href="">My courses</a>
                </li>


                <li role="presentation">
                    <a href="">Register Users</a>
                </li>
                <li>
                    <a href="">Register Courses</a>
                </li>

            </ul>
            <div class="nav navbar-nav navbar-right">
                Welcome to
                <mark>Trincity</mark>
                NTA

                <button class="btn btn-default">Log</button>
            </div>


            <a href="">Login in</a>


        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-8 table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Course No</th>
                        <th>Course Name</th>
                        <th>Description</th>
                        <th>Course Credit</th>
                        <th>Room No</th>
                        <th>Campus</th>
                        <th>Trainer</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    <?php
                $client = new SoapClient("http://localhost:52168/coursesStream.asmx?WSDL");
                $cam = "Trincity";
                foreach($client->CoursesByLocation(array("campus"=>$cam))->CoursesByLocationResult as $sc){
                    foreach($sc as $key){
                    ?>
                    <tr>

                        <td>
                            <?php echo $key->course->cid ?>
                        </td>
                        <td>
                            <?php echo $key->course->name ?>
                        </td>
                        <td>
                            <?php echo $key->course->description ?>
                        </td>
                        <td>
                            <?php echo $key->course->credit ?>
                        </td>
                        <td>
                            <?php echo $key->Campus->roomNo ?>
                        </td>
                        <td>
                            <?php echo $key->Campus->location ?>
                        </td>
                        <td>
                            <?php echo $key->Trainer->fname ?>
                        </td>
                        <td>
                            <?php echo $key->course->sDate ?>
                        </td>
                        <td>
                            <?php echo $key->course->eDate ?>
                        </td>
                    </tr>
                    <?php
                    }
                }
                    ?>



                </table>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">CNN: Breaking News</h3>
                </div>

                <iframe class="panel-body" src="http://localhost:50770/phpFeed.php" width="100%" style="border:none"></iframe>

            </div>
        </div>
    </div>

</body>
</html>