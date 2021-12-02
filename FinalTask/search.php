<?php
require 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Syalectric Ordering System: Search</title>

    

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <style>
        html {
        width:100%;
        height:100%;
        background:url(img_8.jpg) center center no-repeat;
        min-height:100%;
        background-size: cover;
      }
      hr {
        border: 1px solid black;
      }
      .btn{
        background-color:#7f0000;
        color:#fbfbfb;
      }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<section class="main-panel">
    <div class="overlay"></div>

    <?php include_once 'nav_bar_search.php'; ?>
 

    <!--<div class="container-fluid" style="height: 80%;display: flex;justify-content: center;align-items: center;">
        <div class="container content">
            <div class="text-center" style="margin-bottom: 3rem;">
                <div class="row">
                    <!--<div class="col-md-12">
                        <h1>Syalectric Ordering System: Search</h1>
                        <hr style="border-top: 1px solid transparent;"/>
                        <p>Search product by name, price or category id.</p>
                    </div>
                   <div class="col-md-offset-2 col-md-8">
                        <form action="#" method="POST" id="searchForm">
                            <div class="form-group">
                                <input type="text" class="form-control text-center input-lg" id="inputSearch"
                                       name="search"
                                       placeholder="Philips 1499 CH001" autocomplete="off" required/>
                                <span id="helpBlock2" class="help-block"></span>
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

</section>

<section id="resultSection" class="container resultList" style="padding: 20px;display: none;">
    <div class="text-center">
        
        <center><div><font color="#7f0000" face="serif" style="font-size:3vw">Result</font></div></center>
        <h4>Here are <span class="result-count">0</span> results for you.</h4><hr>
    </div>

    <div class="row list-item"></div>
</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
    $("#searchForm").submit(function (e) {
        e.preventDefault();

        var input = $("#inputSearch");
        var val = input.val();

        input.parent().removeClass('has-error');
        input.parent().find("#helpBlock2").text("");

        if (val.length > 2) {
            $.ajax({
                url: 'ajax/search.php',
                type: 'get',
                dataType: 'json',
                data: {
                    search: val
                },
                beforeSend: function () {
                    $("body").addClass('loading');
                    input.addClass('disabled');
                },
                success: function (res) {
                    $('.list-item').empty();

                    if (res.status == 200) {
                        $(".result-count").text(res.data.length);

                        $.each(res.data, function (idx, data) {
                            if (data.FLD_PRODUCT_IMAGE === '')
                                data.FLD_PRODUCT_IMAGE = data.FLD_PRODUCT_ID + '.jpg';

                            $('.list-item').append(`<div class="col-md-4">
                                <div class="thumbnail thumbnail-dark">
                                <img src="products/${data.FLD_PRODUCT_IMAGE}" alt="${data.FLD_PRODUCT_NAME}" style="height: 345px;">
                                <div class="caption text-center">
                                <h3>${data.FLD_PRODUCT_NAME}</h3>
                                <p>
                                <a href="products_details.php?pid=${data.FLD_PRODUCT_ID}" class="btn btn-default" role="button">View</a>
                                </p>
                                </div>
                                </div>
                                </div>`);
                        });

                        $(".resultList").show("slow", function () {
                            $("body").removeClass('loading');

                            $('html, body').animate({
                                scrollTop: $("#resultSection").offset().top
                            }, 500);
                        });
                    }
                },
                complete: function () {
                    input.removeClass('disabled');
                }
            });
        } else {
            input.parent().addClass("has-error");
            input.parent().find("#helpBlock2").text("Please enter more than 2 characters.");

            $('.list-item').empty();
        }
    });
</script>

</body>
</html>