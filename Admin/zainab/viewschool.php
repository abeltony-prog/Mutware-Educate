 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href=" bootstrap-4.4.1-dist/css/bootstrap.min.css">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                             <h4 style="font-size: 35px;">M<span class="fr" style="   color: #4ECDC4;">utware</span></h4>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                      <li class="has-sub">
                          <a id="#mybtn"  href="index.php ">
                              <i class="fas fa-bar"></i>Dashboard</a>

                      </li>
                        <li class="has-sub">
                            <a id="#mybtn"  href="addschool.php ">
                                <i class="fas fa-edit"></i>Add Schools</a>

                        </li>
                        <li>
                            <a href="expert.php  ">
                                <i class="fas fa-table"></i>Expert</a>
                        </li>
                        <li>
                            <a href="contactview.php">
                                <i class="far fa-check-square"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Department</a>
                        </li>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                     <h4 style="font-size: 35px;">M<span class="fr" style="   color: #4ECDC4;">utware</span></h4>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                      <li >
                          <a  id="#mybtn" href="index.php ">
                              <i class="fas fa-edit"></i>Dashboard</a>

                      </li>
                        <li >
                            <a  id="#mybtn" href="addschool.php ">
                                <i class="fas fa-school"></i>Add Schools</a>

                        </li>
                        <li class="active has-sub">
                            <a href="viewschool.php">
                                <i class="fas fa-chart-bar"></i>Schools</a>
                        </li>
                        <li>
                            <a href="expert.html">
                                <i class="fas fa-users"></i>Experts</a>
                        </li>
                        <li>
                            <a href="contactview.php">
                                <i class="fas fa-envelope-open"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-copy"></i>Departments</a>
                        </li>



                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
               <div  style="margin-top: 110px; background-color: white;" class="container-fluid bg">
<div class="row">
 <h2 style="margin-left: 410px; margin-top: 40px; margin-bottom: 60px; color: #4ECDC4;">View data</h2></div>
   <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>

    <table    class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th>School id</th>
        <th>School name</th>
        <th>School type</th>
        <th>School email</th>
        <th>District</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="table">

    </tbody>
  </table>
</div>
  </div>
  <!-- modaldate-->
      <div class="modal fade" id="update_country" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="color:#fff;background-color: white;padding:30px;">
              <h5 class="modal-title" style="color:#4ECDC4; "><i class="fa fa-edit"></i> Update</h5>

            </div>
            <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                <!--1-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label> SchoolName</label>


                        <input type="text" name="name_modal" id="name_modal" class="form-control " required>
                    </div>
                </div>
                <!--2-->
                <div class="row">
                    <div class="col-lg-12 col-md-12  ">
                        <label>Schoolid</label>

                        <input type="text" name="id_modal" id="id_modal" class="form-control " required>
                    </div>
                </div>
                <!--3-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label>SchoolType</label>

                        <input type="text" name="type_modal" id="type_modal" class="form-control " required>
                    </div>
                </div>
                <!--4-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label>Schoolemail</label>

                        <input type="text" name="email_modal" id="email_modal" class="form-control " required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label>District</label>

                        <input type="text" name="district_modal" id="district_modal" class="form-control " required>
                    </div>
                </div>
                 </div>
            <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
            <p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #4ECDC4;color:#fff;">Save</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #4ECDC4;color:#fff;">Close</button></p>
            </div></div>
          </div>
          </div>
        </div>
    </div>

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

    <!-- Jquery JS-->

     <script src=" js/jquery.min.js"></script>
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src=" bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/mainn.js"></script>
 <script>
    $.ajax({
        url: "viewajax.php",
        type: "POST",
        cache: false,
        success: function(data){

            $('#table').html(data);
        }
    });
    $(document).on("click", ".delete", function() {
        var $ele = $(this).parent().parent();
        $.ajax({
            url: "delete.php",
            type: "POST",
            cache: false,
            data:{
                id: $(this).attr("data-id")
            },
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $ele.fadeOut().remove();
                }
            }
        });
    });
 $(function () {
        $('#update_country').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); /*Button that triggered the modal*/
            var name = button.data('name');
            var id = button.data('id');
            var type = button.data('type');
            var email = button.data('email');
            var district = button.data('place');


            var modal = $(this);
            modal.find('#name_modal').val(name);
             modal.find('#id_modal').val(id);
              modal.find('#type_modal').val(type);
            modal.find('#email_modal').val(email);
            modal.find('#district_modal').val(district);

        });
    });
    $(document).on("click", "#update_data", function() {
        $.ajax({
            url: "updateajax.php",
            type: "POST",
            cache: false,
            data:{
                id: $('#id_modal').val(),
                name: $('#name_modal').val(),
                email: $('#email_modal').val(),
                type: $('#type_modal').val(),
                place: $('#district_modal').val(),

            },
            success: function(dataResult){
                // var dataResult = JSON.parse(dataResult);
               console.log(dataResult.District);
              /* for(var a;a<dataResult.length;a++){
                var id=dataResult[a].Sid;
                var name=dataResult[a].Sname;
                var type=dataResult[a].Stype;
                var email=dataResult[a].Email;
                var place=dataResult[a].District;
               var html="";
               html+="<tr>";
               html +="<td>"+id+"</td>";
                html +="<td>"+name+"</td>";
                 html +="<td>"+type+"</td>";
                  html +="<td>"+email+"</td>";
                   html +="<td>"+place+"</td>";}*/
                  // $("#table").append(dataResult);
                  location.reload();
                //if(dataResult.statusCode==200){
                   // $('#update_country').modal().hide();
                   // alert('Data updated successfully !');
                   // location.reload();
                }
            });
        });




</script>
</body>

</html>
<!-- end document-->
