<?php
  if (!isset($this->session->userdata['logged_in']))
  {
      header("location: ". base_url()."game");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kaun Banega Physicist</title>

    <base href="<?php echo base_url(); ?>" />

    <!-- Global stylesheets -->
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="assets/css/customComponents.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="assets/js/custom/global.js"></script>
    <script type="text/javascript" src="assets/js/custom/ajax.js"></script>
    <script type="text/javascript" src="assets/js/custom/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="assets/js/plugins/notifications/bootbox.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/inputs/maxlength.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/velocity/velocity.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/velocity/velocity.ui.min.js"></script>
    <script>
    function logout(e){
      e.preventDefault();
        blockPage();
        postBack("administrator/logout","", function(response){
                    console.log(response);
                    var json = JSON.parse(response);

                    if(json.status == true)
                    {
                        window.location = "game";
                    }
                    else {
                        unblockPage();
                        showErrorMessage("Failed to logout. " + json.message);
                            //grecaptcha.reset();
                    }
            });

    }
    </script>

    <!-- /core JS files -->
    </head>
    <body>

    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" >
            Kaun Banega Physicist Adminsitrator
                
            </a>
            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li>
                    <a class="sidebar-control sidebar-main-toggle hidden-xs">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/nophoto.jpg" alt="">
                        <span><?php echo $this->session->userdata['logged_in']['name']; ?></span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        
                        <li><a href="#" onclick="logout(event)"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>