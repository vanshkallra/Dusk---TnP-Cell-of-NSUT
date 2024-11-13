<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <title>Dusk - NSUT</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!-- Footer -->
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <style>
        /* Global Styles */
        body {
            background-color: #f8f9fa;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .navbar {
            background-color: #343a40;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand,
        .navbar .navbar-nav li a {
            color: white;
            font-weight: 500;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .navbar .navbar-nav li a:hover {
            color: #00c6ff;
        }

        /* Header Section */
        .header-content {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        .header-content h1 {
            font-size: 4em;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #343a40;
            transition: color 0.3s ease;
        }

        .header-content h1.heading-name {
            font-size: 2em;
            font-weight: 300;
            margin-top: 10px;
            opacity: 0.9;
            color: #555;
        }

        .header-content .tagline {
            font-size: 1.1em;
            line-height: 1.5;
            margin-top: 15px;
            font-weight: 300;
            opacity: 0.8;
            color: #666;
            transition: opacity 0.3s ease;
        }

        .header-content .tagline:hover {
            opacity: 1;
        }

        .btn-primary {
            background-color: orange;
            border-color: #00a3cc;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #00a3cc;
            border-color: #0056b3;
        }

        /* Footer Styles */
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 40px 0;
            transition: background-color 0.3s ease;
        }

        .footer h3 {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 20px;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .footer h3:hover {
            opacity: 1;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li a {
            color: #bbb;
            font-size: 16px;
            font-weight: 400;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: #00c6ff;
        }

        .footer .ftr-logo p {
            font-size: 14px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .footer .ftr-logo p:hover {
            opacity: 1;
        }

        .footer .get_in_touch p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Fade-In Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }

            .header-content h1 {
                font-size: 3em;
            }

            .header-content .tagline {
                font-size: 1em;
            }

            .footer {
                text-align: center;
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" target="_blank" href="http://nsut.ac.in/">Netaji Subhas University of Technology</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="../SProfile/index.php">Student Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../CompanyProfile/index.php">Company Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Dusk</h1>
                <h1 class="heading-name">The TnP Cell of NSUT</h1>
                <hr>
                <div class="tagline">NSUT (Previously NSIT) is an autonomous Institution under Govt. of NCT of Delhi and affiliated to University of Delhi, Netaji Subhas Institute of Technology is a seat of higher technical education in India. Established with the objective of meeting the growing demands of manpower in the emerging fields of engineering and technology, over a period of time, the institute has carved a niche for itself, both nationally and internationally, for excellence in technical education and research.<br>We are here to Build your Skills and Career with our Driven Passion and Reality.</br>Click Below to Get Our Current Drive
                    Details</div>
                <a href="http://localhost/tnp-dusk/Drives/index.php" class="btn btn-primary btn-xl page-scroll">KNOW MORE</a>
            </div>
        </div>
    </header>

    <!-- Footer Section -->
    <div class="footer">
        <div class="container">
            <div class="col-md-3 ftr_navi ftr">
                <h3>NAVIGATION</h3>
                <ul>
                    <li>
                        <a href="../Homepage/home.php">Home</a>
                    </li>
                    <li>
                        <a href="../SProfile/index.php">Student Login</a>
                    </li>
                    <li>
                        <a href="../CompanyProfile/index.php">Company Login</a>
                    </li>
                    <li>
                        <a href="../PProfile/index.php">Placement Login</a>
                    </li>
                    <li>
                        <a href="../HODProfile/index.php">HOD Login</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 ftr_navi ftr">
                <h3>MEMBERS</h3>
                <ul>
                    <li>
                        <a href="#">Customer Support</a>
                    </li>
                    <li>
                        <a href="#">Placement Support</a>
                    </li>
                    <li>
                        <a href="#">Faculty Support</a>
                    </li>
                    <li>
                        <a href="#">Registered Companies</a>
                    </li>
                    <li>
                        <a href="#">Training</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 get_in_touch ftr">
                <h3>GET IN TOUCH</h3>
                <p>NSUT</p>
                <p>Academic Section, NSUT Sector 3 Dwarka, New Delhi-110078</p>
                <p>011-25000268</p>
                <a href="mailto:academic@nsut.ac.in">academic@nsut.ac.in</a>
            </div>
            <div class="col-md-3 ftr-logo">
                <p>Copyright &copy; 2024 Dusk</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</body>

</html>
