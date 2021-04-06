<?php
include_once "admin/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.hody.co/html/comet/shop-3col.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:50:52 GMT -->

<head>
  <title>Comet | Creative Multi-Purpose HTML Template</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/bundle.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Halant:300,400" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-46276885-13', 'auto');
    ga('send', 'pageview');
  </script>

  <style>
    .shop-product .product-thumb {
      width: 100%;
      height: 321px;
      background: #000;
    }
  </style>
</head>

<body>
  <!-- Preloader-->
  <div id="loader">
    <div class="centrize">
      <div class="v-center">
        <div id="mask">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </div>
  <!-- End Preloader-->
  <!-- Navigation Bar-->
  <header id="topnav">
    <div class="container">
      <!-- Logo container-->
      <div class="logo">
        <a href="index.php">
          <img src="images/logo_light.png" alt="" class="logo-light">
          <img src="images/logo_dark.png" alt="" class="logo-dark">
        </a>
      </div>
      <!-- End Logo container-->

      <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="admin/index.php">Admin</a>
          </li>
        </ul>
        <!-- End navigation menu        -->
      </div>
    </div>
  </header>
  <!-- End Navigation Bar-->
  <section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="images/bg/19.jpg" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">Shop</h1>
              <h4>Free Delivery Worldwide.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-3 hidden-sm hidden-xs">
          <div class="sidebar">
            <div class="widget">
              <h6 class="upper">Categories</h6>
              <ul class="nav">
                <li>
                  <a href="?">All</a>
                </li>
                <!-- single catagories start  -->
                <?php


                $data = singleColumn('products', 'category');
                while ($category = $data->fetch_object()) :
                ?>
                  <li>
                    <a href="?category_name=<?php echo $category->category ?>"><?php echo $category->category ?></a>
                  </li>
                <?php endwhile; ?>
                <!-- single catagories end  -->

              </ul>
            </div>
            <!-- end of widget        -->
            <div class="widget">
              <h6 class="upper">Trending Products</h6>
              <ul class="nav product-list">
                <?php
                $top = findTop('products', 3);
                while ($topProduct = $top->fetch_object()) :
                ?>
                  <!-- single tranding product start  -->
                  <li>
                    <div class="product-thumbnail">
                      <img src="admin/photos/<?php echo $topProduct->photo ?>" alt="">
                    </div>
                    <div class="product-summary">
                      <a href="shop-single.php?id=<?php echo $topProduct->id?>"><?php echo $topProduct->productName ?></a>
                      <del>$<?php echo $topProduct->regularPrice ?></del>
                      <br>
                      <span>$<?php echo $topProduct->sellingPrice ?></span>
                    </div>
                  </li>
                <?php endwhile; ?>

                <!-- single tranding product end  -->

              </ul>
            </div>
            <!-- end of widget          -->
            <div class="widget">
              <h6 class="upper">Search Shop</h6>
              <form action="" method="POST">
                <input type="text" name="search" placeholder="Search.." class="form-control"><br>
                <input type="submit" name="search-btn" value="Search" class="btn btn-danger btn-sm">
              </form>
            </div>
            <!-- end of widget        -->
            <div class="widget">
              <h6 class="upper">Popular Tags</h6>
              <div class="tags clearfix">
                <!-- popular tags start  -->
                <?php
                $tags = singleColumn('products', 'tag');
                while ($tag = $tags->fetch_object()) :
                ?>
                  <a href="?tag_name=<?php echo $tag->tag ?>"><?php echo $tag->tag ?></a>


                <?php endwhile; ?>
                <!-- popular tags end  -->


              </div>
            </div>
            <!-- end of widget      -->
          </div>
          <!-- end of sidebar-->
        </div>
        <div class="col-md-9">
          <div class="shop-menu">
            <div class="row">
              <div class="col-sm-8">

                <h6 class="upper">Displaying <?php echo countValue('products', 'productName', 'countVal'); ?> results
                </h6>
              </div>
              <div class="col-sm-4">
                <form action="" method="POST">
                  <div class="form-select">
                    <select name="typeFilter" class="form-control">
                      <option selected="selected" value="">Sort By</option>
                      <option value="H2L">Price high to low</option>
                      <option value="L2H">Price low to high</option>
                    </select>
                  </div><br>

                  <input type="submit" name="submit" class="btn btn-danger btn-sm float-right" value="Filter">

                </form>
              </div>
            </div>
            <!-- end of row-->
          </div>
          <div class="container-fluid">
            <div class="row">
              <?php
              $data = allOutTrash('products');
              //Search function start
              if (isset($_POST['search-btn'])) {
                $search = $_POST['search'];
                $data = search('products', 'productName', $search);
              }
              //Search function end

              // cetagory filter start
              if (isset($_GET['category_name'])) {
                $category_name = $_GET['category_name'];
                $data = singleFind('products', 'category', $category_name);
              }
              // cetagory filter end

              // tag filter start
              if (isset($_GET['tag_name'])) {
                $tag_name = $_GET['tag_name'];
                $data = singleFind('products', 'tag', $tag_name);
              }
              // tag filter end


              if (isset($_POST['submit'])) {
                $oo = $_POST['typeFilter'];

                if ($oo == 'L2H') {
                  $data = connect()->query("SELECT * FROM products WHERE regularPrice BETWEEN 1 AND 99999");
                } else if ($oo == 'H2L') {
                  $data = connect()->query("SELECT * FROM products WHERE regularPrice  BETWEEN 1 AND 9999 ORDER BY regularPrice DESC");
                }
              }




              $i = 1;

              while ($product = $data->fetch_object()) :
              ?>
                <!-- single product start  -->
                <div class="col-md-4 col-sm-6">
                  <div class="shop-product">
                    <div class="product-thumb">
                      <a href="shop-single.php?id=<?php echo $product->id?>">
                        <img src="admin/photos/<?php echo $product->photo ?>" alt="">
                      </a>
                      <div class="product-overlay"><a href="#" class="btn btn-color-out btn-sm">Add To Cart<i class="ti-bag"></i></a>
                      </div>
                    </div>
                    <div class="product-info">
                      <h4 class="upper"><a href="#"><?php echo $product->productName ?></a></h4><span>Regular Price : <del>$<?php echo $product->regularPrice ?></del></span><br><span> Selling Price : $<?php echo $product->sellingPrice ?></span>
                      <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              <!-- single product end  -->

            </div>
            <!-- end of row-->
            <ul class="pagination">
              <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
              </li>
              <li class="active"><a href="#">1</a>
              </li>
              <li><a href="#">2</a>
              </li>
              <li><a href="#">3</a>
              </li>
              <li><a href="#">4</a>
              </li>
              <li><a href="#">5</a>
              </li>
              <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
              </li>
            </ul>
            <!-- end of pagination-->
          </div>
        </div>
      </div>
    </div>
    <!-- end of container-->
  </section>
  <!-- Footer-->
  <footer id="footer-widgets">
    <div class="container">
      <div class="go-top">
        <a href="#top">
          <i class="ti-arrow-up"></i>
        </a>
      </div>
      <div class="row">
        <div class="col-md-6 ov-h">
          <div class="row">
            <div class="col-sm-4">
              <div class="widget">
                <h6 class="upper">About Comet</h6>
                <p>
                  <span>Fourth Floor</span>
                  <span>New York, NY 10011</span>
                  <span>hello@comet.com</span>
                </p><a href="#" class="btn btn-color-out btn-sm">Hire Us!</a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="widget">
                <h6 class="upper">Culture</h6>
                <ul class="list-unstyled">
                  <li>
                    <a href="#">Team</a>
                  </li>
                  <li>
                    <a href="#">Process</a>
                  </li>
                  <li>
                    <a href="#">Story</a>
                  </li>
                  <li>
                    <a href="#">Careers</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="widget">
                <h6 class="upper">Case Studies</h6>
                <ul class="list-unstyled">
                  <li>
                    <a href="portfolio-single-1.html">Neleman Cava</a>
                  </li>
                  <li>
                    <a href="portfolio-single-2.html">Sweet Lane</a>
                  </li>
                  <li>
                    <a href="portfolio-single-3.html">Jeff Burger</a>
                  </li>
                  <li>
                    <a href="portfolio-single-1.html">Juice Meds</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-md-offset-2">
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <h6 class="upper">Stay in touch</h6>
                <p>Sign Up to get the latest updates.</p>
                <div class="footer-newsletter">
                  <form data-mailchimp="true" class="inline-form">
                    <div class="input-group">
                      <input type="email" name="email" placeholder="Your Email" class="form-control"><span class="input-group-btn"><button type="submit" data-loading-text="Loading..." class="btn btn-color">Subscribe</button></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </footer>
  <footer id="footer">
    <div class="container">
      <div class="footer-wrap">
        <div class="row">
          <div class="col-md-4">
            <div class="copy-text">
              <p><i class="icon-heart red mr-15"></i>© 2015 Comet Agency.</p>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-inline">
              <li>
                <a href="#">About</a>
              </li>
              <li>
                <a href="#">Services</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="footer-social">
              <ul>
                <li>
                  <a target="_blank" href="#"><i class="ti-facebook"></i></a>
                </li>
                <li>
                  <a target="_blank" href="#"><i class="ti-twitter-alt"></i></a>
                </li>
                <li>
                  <a target="_blank" href="#"><i class="ti-linkedin"></i></a>
                </li>
                <li>
                  <a target="_blank" href="#"><i class="ti-instagram"></i></a>
                </li>
                <li>
                  <a target="_blank" href="#"><i class="ti-dribbble"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end of row-->
      </div>
    </div>
    <!-- end of container-->
  </footer>
  <!-- end of footer-->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bundle.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>


<!-- Mirrored from themes.hody.co/html/comet/shop-3col.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:51:09 GMT -->

</html>