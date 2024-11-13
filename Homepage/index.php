<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=home.php">
    <title>Welcome to Dusk</title>
    <style>
        /* Global Styles */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            /* background: linear-gradient(180deg, #020000, #0056b3); */
            background: linear-gradient(180deg, #020000, #0056b3 50%, #020000);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            overflow: hidden;
        }

        /* Centered Box */
        .content {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 40px 60px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            max-width: 400px;
            width: 100%;
        }

        /* NSUT Logo */
        .nsut-logo {
            width: 120px;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
        }

        /* Title Styles */
        h1 {
            font-size: 2.5em;
            margin: 15px 0;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Subtitle */
        h3 {
            font-size: 1.3em;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        /* Description */
        h4 {
            font-size: 1.1em;
            opacity: 0.75;
        }

        /* Footer Link */
        h6 {
            font-size: 0.9em;
            margin-top: 25px;
            color: #f0f0f0;
        }

        a {
            color: #00c6ff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        a:hover {
            color: #00a3cc;
            text-decoration: underline;
        }

        /* Animation for smooth fading */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <img class="nsut-logo" src="images/nsut-logo-png2.svg" alt="NSUT Logo"/>
        <h1>Welcome to Dusk</h1>
        <h3>The Training and Placement Cell of NSUT</h3>
        <h4>Please wait while we redirect you to our page...</h4>
        <h6>Not redirected? <a href="home.php">Click here</a></h6>
    </div>
</body>
</html>
