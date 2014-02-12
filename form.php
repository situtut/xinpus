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

        <link rel="icon" href="img/favicon.png">

        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/fastclick.min.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
    </head>
    <body>
        <style> .error.message { margin-top: -0.75rem;} </style>
        <div class="row" style="margin-top: 50px">
            <form action="" method="POST">
                <fieldset>
                    <legend>Enrollment</legend>

                    <label for="">Name <small>Required</small></label>
                    <div class="row">
                        <div class="large-6 columns">
                            <input type="text" name="first_name" placeholder="First name" value="<?php echo @$_POST['first_name'] ?>" />
                            <?php if($validator->first('first_name')): ?>
                                <small class="error message"><?php echo $validator->first('first_name') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="large-6 columns">
                            <input type="text" name="last_name" placeholder="Last name" value="<?php echo @$_POST['last_name'] ?>" />
                            <?php if($validator->first('last_name')): ?>
                                <small class="error message"><?php echo $validator->first('last_name') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <label for="">Email <small>Required</small></label>
                    <div class="row">
                        <div class="large-6 columns">
                            <input type="text" name="email" placeholder="Email" value="<?php echo @$_POST['email'] ?>" />
                            <?php if($validator->first('email')): ?>
                                <small class="error message"><?php echo $validator->first('email') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <label for="">Username <small>Required</small></label>
                    <div class="row">
                        <div class="large-6 columns">
                            <input type="text" name="username" placeholder="Username" value="<?php echo @$_POST['username'] ?>" />
                            <?php if($validator->first('username')): ?>
                                <small class="error message"><?php echo $validator->first('username') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <label for="">Password <small>Required</small></label>
                    <div class="row">
                        <div class="large-6 columns">
                            <input type="password" name="password" placeholder="Password" />
                            <?php if($validator->first('password')): ?>
                                <small class="error message"><?php echo $validator->first('password') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="large-6 columns">
                            <input type="password" name="_password" placeholder="Retype password" />
                            <?php if($validator->first('_password')): ?>
                                <small class="error message"><?php echo $validator->first('_password') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <label>Birth Date <small>Required</small></label>
                    <div class="row">
                        <div class="large-4 columns">
                            <select name="day" id="">
                                <option value="0" <?php if(@$_POST['day'] == '0') echo 'selected' ?>>Select Day</option>
                                <?php for($i = 1; $i <= 31; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php if (@$_POST['day'] == $i) { echo 'selected'; } else { if($i == date('d')) echo 'selected'; }; ?>><?php echo $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <?php if($validator->first('day')): ?>
                                <small class="error message"><?php echo $validator->first('day') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="large-4 columns">
                            <select name="month" id="">
                                <option value="0" <?php if(@$_POST['day'] == '0') echo 'selected' ?>>Select Month</option>
                                <?php for ($x=1; $x<13; $x++): ?>
                                    <option value="<?php echo $x ?>" <?php if(@$_POST['month'] == $x) { echo 'selected'; } else { if($x == date('m')) echo 'selected'; } ?>><?php echo date('F', mktime(0,0,0,$x)) ?></option>
                                <?php endfor; ?>
                            </select>
                            <?php if($validator->first('month')): ?>
                                <small class="error message"><?php echo $validator->first('month') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="large-4 columns">
                            <select name="year" id="">
                                <option value="0" <?php if(@$_POST['day'] == '0') echo 'selected' ?>>Select year</option>
                                <?php foreach(range(1945, (int) date('Y')) as $year): ?>
                                    <option value="<?php echo $year ?>" <?php if(@$_POST['year'] == $year) { echo 'selected'; } else { if($year == date('Y')) echo 'selected'; } ?>><?php echo $year ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if($validator->first('year')): ?>
                                <small class="error message"><?php echo $validator->first('year') ?></small>
                            <?php endif; ?>
                        </div>
                        <input type="hidden">
                    </div>
                    <?php if($validator->first('age')): ?>
                        <small class="error message"><?php echo $validator->first('age') ?></small>
                    <?php endif; ?>

                    <label for="">Sex <small>Required</small></label>
                    <input type="radio" name="sex" value="male" id="male" <?php if(@$_POST['sex'] == 'male') echo 'checked' ?> /><label for="male">Male</label>
                    <input type="radio" name="sex" value="female" id="female" <?php if(@$_POST['sex'] == 'female') echo 'checked' ?> /> <label for="female">Female</label>
                    <?php if($validator->first('sex')): ?>
                        <small class="error message"><?php echo $validator->first('sex') ?></small>
                    <?php endif; ?>

                    <label for="">Major <small>Required</small></label>
                    <select name="major" id="">
                        <option value="0">-- Select one --</option>
                        <option <?php if(@$_POST['major'] == 'it') echo 'selected' ?> value="it">IT</option>
                        <option <?php if(@$_POST['major'] == 'witch') echo 'selected' ?> value="witch">Witch</option>
                        <option <?php if(@$_POST['major'] == 'accounting') echo 'selected' ?> value="accounting">Accounting</option>
                    </select>
                    <?php if($validator->first('major')): ?>
                        <small class="error message"><?php echo $validator->first('major') ?></small>
                    <?php endif; ?>

                    <label for="">Phone Number</label>
                    <input type="text" name="phone" value="<?php echo @$_POST['phone'] ?>" placeholder="Phone Number" />
                    <?php if($validator->first('phone')): ?>
                        <small class="error message"><?php echo $validator->first('phone') ?></small>
                    <?php endif; ?>

                    <label for="">Address <small>Required</small> </label>
                    <input type="text" name="address" value="<?php echo @$_POST['address'] ?>" placeholder="Address" />
                    <?php if($validator->first('address')): ?>
                        <small class="error message"><?php echo $validator->first('address') ?></small>
                    <?php endif; ?>

                    <label for="">Zip Code <small>Required</small> </label>
                    <input type="text" name="zip" value="<?php echo @$_POST['zip'] ?>" placeholder="Zip Code" />
                    <?php if($validator->first('zip')): ?>
                        <small class="error message"><?php echo $validator->first('zip') ?></small>
                    <?php endif; ?>

                    <label for="">Height <small>Required</small> </label>
                    <input type="text" name="height" value="<?php echo @$_POST['height'] ?>" placeholder="Height" />
                    <?php if($validator->first('height')): ?>
                        <small class="error message"><?php echo $validator->first('height') ?></small>
                    <?php endif; ?>

                    <label for="">Weight <small>Required</small> </label>
                    <input type="text" name="weight" value="<?php echo @$_POST['weight'] ?>" placeholder="Weight" />
                    <?php if($validator->first('weight')): ?>
                        <small class="error message"><?php echo $validator->first('weight') ?></small>
                    <?php endif; ?>

                    <label for="">Hobby <small>Required</small> </label>
                    <input type="checkbox" name="hobby[]" value="code" <?php if(isset($_POST['hobby'])) if(in_array('code', $_POST['hobby'])) echo "checked" ?>> <span>Write a code</span>
                    <input type="checkbox" name="hobby[]" value="gaming" <?php if(isset($_POST['hobby'])) if(in_array('gaming', $_POST['hobby'])) echo "checked" ?>> <span>Gaming</span>
                    <input type="checkbox" name="hobby[]" value="music" <?php if(isset($_POST['hobby'])) if(in_array('music', $_POST['hobby'])) echo "checked" ?>> <span>Listen to the music</span>
                    <input type="checkbox" name="hobby[]" value="sport" <?php if(isset($_POST['hobby'])) if(in_array('sport', $_POST['hobby'])) echo "checked" ?>> <span>To do sport</span>
                    <input type="checkbox" name="hobby[]" value="biking" <?php if(isset($_POST['hobby'])) if(in_array('biking', $_POST['hobby'])) echo "checked" ?>> <span>Biking</span>
                    <input type="checkbox" name="hobby[]" value="hiking" <?php if(isset($_POST['hobby'])) if(in_array('hiking', $_POST['hobby'])) echo "checked" ?>> <span>Hiking</span>
                    <input type="checkbox" name="hobby[]" value="sleeping" <?php if(isset($_POST['hobby'])) if(in_array('sleeping', $_POST['hobby'])) echo "checked" ?>> <span>Sleeping</span>
                    <input type="checkbox" name="hobby[]" value="nothing" <?php if(isset($_POST['hobby'])) if(in_array('nothing', $_POST['hobby'])) echo "checked" ?>> <span>Doing nothing</span>
                    <input type="checkbox" name="hobby[]" value="eating" <?php if(isset($_POST['hobby'])) if(in_array('eating', $_POST['hobby'])) echo "checked" ?>> <span>Eating</span>
                    <input type="checkbox" name="hobby[]" value="sex" <?php if(isset($_POST['hobby'])) if(in_array('sex', $_POST['hobby'])) echo "checked" ?>> <span>Sex</span>
                    <?php if($validator->first('hobby')): ?>
                        <small class="error message"><?php echo $validator->first('hobby') ?></small>
                    <?php endif; ?>

                </fieldset>
                <div>
                    <input type="submit" value="Ok" class="button tiny">
                </div>
            </form>
        </div>

        <!-- Our JavaScript Files -->
        <script type="text/javascript">$(document).foundation();</script>
    </body>
</html>
