<?php require_once './app/start.php' ?>

<!DOCTYPE html>
<html>
    <head class="no-js" lang="en">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>ZeekLab&trade;</title>

        <!-- CSS Files -->
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/multiselect.css">

        <link rel="icon" href="img/favicon.png">

        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/fastclick.min.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
        <script type="text/javascript" src="js/multiselect.js"></script>
    </head>
    <body>
        <div class="row" style="margin-top: 50px">
            <form action="" method="POST">
                <fieldset>
                    <legend>Enrollment</legend>

                    <label for="">Name <small>Required</small></label>
                    <div class="row">
                        <div class="large-6 columns">
                            <input type="text" name="fname" placeholder="First name" value="<?php echo @$_POST['fname'] ?>" />
                        </div>
                        <div class="large-6 columns">
                            <input type="text" name="lname" placeholder="Last name" value="<?php echo @$_POST['lname'] ?>" />
                        </div>
                    </div>

                    <label>Birth Date <small>Required</small></label>
                    <div class="row">
                        <div class="large-4 columns">
                            <select name="day" id="">
                                <?php for($i = 1; $i <= 31; $i++): ?>
                                    <option value="<?php echo $i ?>" <?php if(@$_POST['day'] == $i) echo 'selected' ?>><?php echo $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="large-4 columns">
                            <select name="month" id="">
                                <?php for ($x=1; $x<13; $x++): ?>
                                <option value="<?php echo $x ?>" <?php if(@$_POST['month'] == $x) echo 'selected' ?>><?php echo date('F', mktime(0,0,0,$x)) ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="large-4 columns">
                            <select name="year" id="">
                                <?php foreach(range(1945, 2000) as $year): ?>
                                    <option value="<?php echo $year ?>" <?php if(@$_POST['year'] == $year) echo 'selected' ?>><?php echo $year ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <label for="">Sex <small>Required</small></label>
                    <input type="radio" name="sex" value="male" id="male" <?php if(@$_POST['sex'] == 'male') echo 'checked' ?> /><label for="male">Male</label>
                    <input type="radio" name="sex" value="female" id="female" <?php if(@$_POST['sex'] == 'female') echo 'checked' ?> /> <label for="female">Female</label>

                    <label for="">Major <small>Required</small></label>
                    <select name="major" id="">
                        <option <?php if(@$_POST['major'] == 'it') echo 'selected' ?> value="it">IT</option>
                        <option <?php if(@$_POST['major'] == 'witch') echo 'selected' ?> value="witch">Witch</option>
                        <option <?php if(@$_POST['major'] == 'accounting') echo 'selected' ?> value="accounting">Accounting</option>
                    </select>

                    <label for="">Phone Number</label>
                    <input type="text" name="phone" placeholder="Phone Number">

                    <div class="row">
                        <div class="large-6 columns">
                            <label for="hobby">Hobby</label>
                            <input type="text" name="hobby" id="live" style="display:none">
                            <select id="hobby">
                                <option value="php">PHP</option>
                                <option value="js">JS</option>
                                <option value="ruby">Ruby</option>
                                <option value="html">HTML</option>
                                <option value="python">Python</option>
                                <option value="cplusplus">C++</option>
                                <option value="java">Java</option>
                            </select>
                        </div>
                    </div>

                    <label for="">Bio</label>
                    <textarea name="biodata"><?php echo @$POST['biodata'] ?></textarea>

                </fieldset>
                <div>
                    <input type="submit" value="Ok" class="button tiny">
                </div>
            </form>
        </div>

        <!-- Our JavaScript Files -->
        <script type="text/javascript">$(document).foundation();</script>
        <script type="text/javascript">
            $("select#hobby").zmultiselect({
                live: "#live",
                filter: false,
                placeholder: "Select your hobby",
                selectedText: ""
            });
        </script>
    </body>
</html>
