<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchCart</title>
    <link rel="icon" type="image/png" sizes="374x367" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="374x367" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="374x367" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="374x367" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="374x367" href="assets/img/logo.png">
    <link rel="stylesheet" href="res/css/styles2.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Carousel-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body bg-opacity-75 d-flex py-3" style="padding: 13px 0px;height: 113px;background: linear-gradient(146deg, #00f0ff, rgb(250,255,0) 100%), var(--bs-navbar-brand-color);border-style: none;text-align: center;position: relative;">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-lg bs-icon-circle bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><img class="d-inline-block d-xl-flex justify-content-xl-end" style="margin: 11px;padding: 15px;width: 94.1719px;height: 92.9688px;position: sticky;" src="assets/img/logo.png"></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><span style="font-size: 24px;color: rgb(0,128,255);"><strong>&nbsp;WATCH CART</strong></span>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><strong>Landing Page</strong></a></li>
                    <li class="nav-item"><a class="nav-link active" href="shop.php"><strong>Shop</strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="#About-Us" data-bs-toggle="About Us"><strong>About Us</strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="#Contact-Us" data-bs-target="#Contact-Us" data-bs-toggle="#Contact-Us"><strong>Contact Us</strong></a></li>
                </ul><a class="btn btn-primary" role="button" href="shop.php" style="background: #00000000;border-style: solid;border-color: var(--bs-emphasis-color);width: 159.031px;height: 65px;padding: 14px 24px;font-size: 20px;color: var(--bs-navbar-brand-color);font-weight: bold;text-align: center;">Shop Now</a>
            </div>
        </div>
    </nav>
    <div class="carousel slide" data-bs-ride="false" id="carousel-2">
        <div class="carousel-inner">
            <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/Desktop%20-%201%20(2).jpg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Desktop%20-%201%20(1).jpg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Desktop%20-%201.jpg" alt="Slide Image"></div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-2" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-2" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-2" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-2" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-2" data-bs-slide-to="2"></button></div>
    </div>
    <div class="container py-4 py-xl-5">
        <section class="py-4 py-xl-5">
            <div class="container">
                <div class="text-white bg-primary border rounded border-0 border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5" style="background: linear-gradient(90deg, rgb(157,255,252), #fffa79 51%, rgba(255,255,255,0.46) 100%), rgba(255,193,7,0);color: #000000;width: 1111px;text-align: center;">
                    <div class="pb-2 pb-lg-1">
                        <h2 class="fw-bold mb-2" style="color: var(--bs-emphasis-color);">Start Shopping</h2>
                        <p class="lead w-lg-50" style="color: #000000;"><strong>Indulge in the world of horological sophistication. Explore our curated collection of exquisite timepieces that blend innovation and style seamlessly. From classic elegance to cutting-edge technology, find your perfect companion for every moment. Embrace the art of timekeeping and elevate your wrist with our distinguished selection. Your journey starts now – click to shop and own a piece of timelessness.</strong></p><a class="btn btn-light fs-5 py-2 px-4" role="button" href="shop.php" style="background: linear-gradient(97deg, rgba(4,255,244,0.61), rgba(241,246,14,0.47) 59%, rgba(255,255,255,0.66)), var(--bs-btn-border-color);border-style: solid;border-color: var(--bs-emphasis-color);font-size: 20px;padding: 23px 24px;height: 55px;width: 159.031px;"><strong>Shop Now</strong></a>
                    </div>
                    <div class="my-2"></div>
                </div>
            </div>
        </section>
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Why Choose Our Smart Watches?</h2>
                <p class="w-lg-50"></p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;" src="https://www.shutterstock.com/shutterstock/videos/9770810/thumb/4.jpg?ip=x480"></div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>Cutting-edge Technology</h4>
                        <p style="width: 300.375px;">Our smart watches are powered by the latest technology, offering seamless integration with your devices. Experience lightning-fast performance, intuitive user interfaces, and advanced functionality that keeps you connected and in control.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;" src="https://www.cimmino.com/wp-content/uploads/2021/09/pelle-tessuto-1000x667.jpg" width="109" height="200"></div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>Premium Materials for Durability</h4>
                        <p style="width: 300px;">Crafted using top-quality materials, our smart watches are built to withstand the demands of your active lifestyle. From scratch-resistant screens to durable straps, each element is carefully chosen to ensure your watch maintains its sleek appearance and functionality over time.<br><br><br></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;" src="https://www.businessinsider.in/photo/83603553/stylish-smartwatches-for-men-in-india.jpg?imgsize=66420"></div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>Sleek and Modern Design</h4>
                        <p style="width: 300px;">Elevate your style with our sleek and modern smart watch designs. Whether you're dressing up for a special occasion or going for a casual look, our watches blend seamlessly with any outfit, making a statement wherever you go.<br><br><br></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;" src="https://cdn.mos.cms.futurecdn.net/nGyykroaoszcTH9SFCWYui-320-80.jpg"></div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>Health and Fitness Tracking</h4>
                        <p style="width: 300px;">Take charge of your health and fitness journey with our built-in tracking features. Monitor your heart rate, track your steps, measure sleep quality, and more. Our smart watches empower you to achieve your wellness goals by providing valuable insights into your daily activities.<br><br><br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 w-100" style="max-width: 800px;">
            <div class="col order-md-first">
                <div class="card">
                    <div class="ratio ratio-16x9"><iframe src="https://sketchfab.com/models/926bbb797afd46d79f5e2290834836a5/embed?autospin=1&amp;autostart=1"></iframe></div>
                </div>
            </div>
            <div class="col d-md-flex order-first justify-content-md-start align-items-md-end order-md-1">
                <div style="width: 80%;">
                    <h3>Experience 3D Smart Watch Exploration</h3>
                    <p class="w-lg-50">Discover a new dimension of shopping. Immerse yourself in the future with our 3D exploration feature. See every angle, feel every detail. Your next smart watch, closer than ever.<br><br></p>
                </div>
            </div>
            <div class="col order-md-2">
                <div class="card">
                    <div class="ratio ratio-16x9"><iframe src="https://sketchfab.com/models/779bdad35fd54996a70cd77a418ceb77/embed?autospin=1&amp;autostart=1"></iframe></div>
                </div>
            </div>
            <div class="col order-md-2">
                <div class="card">
                    <div class="ratio ratio-16x9"><iframe src="https://sketchfab.com/models/96c15f04856540fd8b3a082bceb1fa2e/embed?autospin=1&amp;autostart=1"></iframe></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid focus-ring focus-ring-success py-4 py-xl-5" style="background: url(&quot;assets/img/Безымянный-1%201.png&quot;);">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Testimonials</h2>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
            <div class="col">
                <div>
                    <p class="bg-body-tertiary border rounded border-0 p-4">I've owned many smart watches before, but none compare to the quality and style of these watches. The attention to detail is impeccable, and the 3D exploration feature made me feel like I was holding the watch in my hands before I even bought it. Highly recommended!</p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://www.ultimatebeaver.com/wp-content/uploads/bb-plugin/cache/photo-gallery-img-02-circle.jpg">
                        <div>
                            <p class="fw-bold text-primary mb-0">John M.</p>
                            <p class="text-muted mb-0">New York, NY</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <p class="bg-body-tertiary border rounded border-0 p-4" style="background: #ffffff;">These smart watches have truly enhanced my lifestyle. From tracking my workouts to receiving notifications effortlessly, they're a game-changer. The elegant design means I can wear them anywhere, and the battery life is impressive. I'm beyond satisfied!</p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://images.squarespace-cdn.com/content/v1/557aec54e4b03c2094a2b4be/1548181738786-ZICMD107QZ5HH52QBUZ1/farough+testimonial+pics-04.png?format=1000w">
                        <div>
                            <p class="fw-bold text-primary mb-0">Sarah L.</p>
                            <p class="text-muted mb-0">Los Angeles, CA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <p class="bg-body-tertiary border rounded border-0 p-4">I love how seamlessly these watches integrate into my life. The connectivity with my phone is flawless, and the touchscreen is so intuitive. I often get asked about my watch, and I'm always quick to recommend it. A must-have for anyone.</p>
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://ssvminstitutions.ac.in/wp-content/uploads/2021/10/SSVM-Parent-Testimonial.jpeg">
                        <div>
                            <p class="fw-bold text-primary mb-0">Alex T</p>
                            <p class="text-muted mb-0">Sydney, Australia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div><?php include("res/php/product_section.php"); ?></div>
    </div>
    <div class="container-fluid py-4 py-xl-5" id="About-Us">
        <h1 class="text-center" style="height: 85px;padding: -9px;">About WatchCart</h1>
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>&nbsp;Elevating Timekeeping with Innovation</h2>
                <p class="lead w-lg-50"><br>At WatchCart, we are more than just a brand; we are a commitment to redefining timekeeping through innovation, quality, and style. Our journey began with a simple yet profound idea: to offer timepieces that seamlessly integrate cutting-edge technology with timeless design. Today, that idea has blossomed into a brand that stands at the forefront of the watch industry.<br><br></p>
            </div>
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Our Vision</h2>
                <p class="lead w-lg-50"><br>At the core of WatchCart's vision is the belief that a watch is not merely a functional accessory, but a statement of individuality. We envision a world where every wrist is adorned with a timepiece that not only tells time but tells a story. A story of innovation, craftsmanship, and the pursuit of excellence.</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Craftsmanship and Quality</h2>
                <p class="lead w-lg-50"><br>Every watch that bears the WatchCart name is a testament to our unwavering commitment to quality and craftsmanship. Our skilled artisans meticulously craft each timepiece using premium materials that withstand the test of time. From the intricately designed dials to the precision-engineered movements, every detail is executed with precision and care.<br><br></p>
            </div>
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Innovation At Heart</h2>
                <p class="lead w-lg-50"><br>Innovation is the beating heart of WatchCart. We constantly push the boundaries of what a watch can be, integrating state-of-the-art technology to enhance functionality and user experience. Our watches seamlessly connect with your devices, empowering you to stay connected and in control, whether you're on a jog or in a boardroom.</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>The WatchCart Experience</h2>
                <p class="lead w-lg-50"><br>We believe that choosing a watch is an intimate experience. It's a reflection of your style, aspirations, and the moments that matter most. That's why we've curated a diverse collection of watches that cater to various tastes and preferences. Whether you're seeking a classic timepiece or a modern smart watch, WatchCart has something that resonates with you.<br><br></p>
            </div>
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Community and Engagement</h2>
                <p class="lead w-lg-50"><br>Beyond crafting exceptional watches, WatchCart is about fostering a community of timekeeping enthusiasts. We invite you to be part of our journey, sharing your stories and experiences with us. Join us on social media platforms to connect with fellow watch lovers and stay updated on the latest innovations and releases.</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Our Commitment</h2>
                <p class="lead w-lg-50"><br>At WatchCart, our commitment extends beyond the timepieces themselves. We are committed to delivering exceptional customer service, ensuring that every interaction you have with us is nothing short of remarkable. Your satisfaction is our priority, and we're dedicated to building relationships as enduring as our watches.<br>As we continue to innovate, design, and create, we invite you to embark on this journey with us. Explore our collection, discover the perfect timepiece that resonates with you, and let us be part of your story—one tick at a time.<br><br>Welcome to WatchCart, where timekeeping meets innovation and style.<br><br><em>-Elevate Time with WatchCart.</em></p>
            </div>
        </div>
    </div>
    <section id="Contact-Us" class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Contact us</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center" style="border-style: none;">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon" style="background: linear-gradient(rgba(0,255,179,0.52) 0%, rgba(255,245,0,0.45) 100%);color: var(--bs-emphasis-color);border-style: solid;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="mb-0">Phone</h6>
                                <p class="mb-0">+123456789</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon" style="background: linear-gradient(rgba(0,255,179,0.52) 0%, rgba(255,245,0,0.45) 100%);color: var(--bs-emphasis-color);border-style: solid;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="mb-0">Email</h6>
                                <p class="mb-0">info@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon" style="background: linear-gradient(rgba(0,255,179,0.52) 0%, rgba(255,245,0,0.45) 100%);color: var(--bs-emphasis-color);border-style: solid;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin">
                                    <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="mb-0">Location</h6>
                                <p class="mb-0">12 Example Street</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="Name"></div>
                            <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="Email"></div>
                            <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Message"></textarea></div>
                            <div><button class="btn btn-primary d-block w-100" type="submit" style="background: linear-gradient(rgba(0,255,179,0.52) 0%, rgba(255,245,0,0.45) 134%, rgba(0,163,255,0.58) 247%);border-style: solid;border-color: var(--bs-emphasis-color);color: rgb(0,0,0);font-weight: bold;">Send </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="fw-semibold text-dark bg-body" style="background: linear-gradient(90deg, #00fff8, rgb(255,245,0) 51%, rgba(255,255,255,0) 100%), var(--bs-yellow);color: rgb(0,0,0);">
              <?php include("footer.php"); ?>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>