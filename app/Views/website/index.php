<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestão de Usuários PHP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icon -->
    <link rel="icon" type="image/png" href="/assets/img/icone/icone.jpg" />

    <!-- CSS here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/Meucss.css">
</head>

<body>

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <nav id="nav-3" style="width: 100%;">
                                <a class="link-3" href="/">Home</a>

                                <?php
                                if ($logged) :
                                    echo ($user->user_type == 1) ? "<a class=\"link-3\" href=\"/plataforma\">Admin</a>" : "";
                                ?>
                                    <a class="profile-btn" href="/"><?php echo $user->name; ?></a>
                                <?php
                                else :
                                ?>
                                    <img class="profile" src="/assets/img/svg_icon/profille.png" alt="">
                                    <a class="profile-btn" href="/auth/entrar">Login</a>
                                <?php endif; ?>
                            </nav>

                        </div>
                    </div>

    </header>
    <!-- header-end -->

    <?php
    echo view($view);
    ?>

    <!-- footer start -->
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- JS here -->
    <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/isotope.pkgd.min.js"></script>
    <script src="/assets/js/ajax-form.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/scrollIt.js"></script>
    <script src="/assets/js/jquery.scrollUp.min.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/nice-select.min.js"></script>
    <script src="/assets/js/jquery.slicknav.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="/assets/js/contact.js"></script>
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/assets/js/jquery.form.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/mail-script.js"></script>

    <script src="/assets/js/main.js"></script>
</body>

</html>
