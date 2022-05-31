<?php

    $apiKey = "db63a6eec0d92fab5efe5afe2162bff0";
   // $cityId = "2639426";  rhu
     $cityId = "2648579";  //glasgow
    // $cityId = "2653266"; // chelmsford
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
        $currentTime = time();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Feedits</title>
        <link href="https:/philiphendry.com/test/style.css" rel="stylesheet"> 
        <link href="https:/philiphendry.com/test/slick.css" rel="stylesheet"> 
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
        <script src="https://kit.fontawesome.com/d7690724ab.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="wrapper">
            <header id="header">
                <a id="logo" href=""><img src="https:/philiphendry.com/test/logo2.png" width=""  height="35px" alt="Feedits"></a>
                <div class="forcasticon">
                    <img src="http://openweathermap.org/img/wn/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
                        <span class="temp"><?php echo substr($data->main->temp, 0, -3); ?>&deg;C</span>
                </div>
                <div id="searchbox">
                    <form onsubmit="event.preventDefault();" class="search" role="search">
                        <input id="search" type="search" placeholder="Search..." autofocus required />
                        <button type="submit">Go</button>    
                    </form>
                </div>
                <div id="headernav">
                    <div class="dropdown">
                        <a href=""><button class="dropbtn"><i class="fas fa-home"></i></button></a>
                    </div>
                    <div class="dropdown">
                        <a href="profile/"><button class="dropbtn"><?php echo $_SESSION['user']['user_name']. " ";  ?><i class="fas fa-user"></i></button></a>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-bell"></i></button>
                        <div class="dropdown-content">
                            <a href="#">Notification 1</a>
                            <a href="#">Notification 2</a>
                            <a href="#">Notification 3</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-cog"></i></button>
                        <div class="dropdown-content">
                            <a href="#">Settings Link 1</a>
                            <a href="#">Settings Link 2</a>
                            <a href="#">Settings Link 3</a>
                        </div>
                    </div>
                </div>
            </header>
            <section id="slingpanel">
                <?php 
                 // $cityId = "2639426";   // Rhu
                    $cityId = "2648579";   //Glasgow
                   // include 'weather.php';
                //https://jsfiddle.net/7sLfo6ud/1/
                 ?>
                
                <div class="time glass">
                    <select id="example" style="width: 100%">
                        <option value="JAN">January</option>
                        <option value="FEB">February</option>
                        <option value="MAR">March</option>
                        <option value="APR">April</option>
                        <option value="MAY">May</option>
                        <option value="JUN">June</option>
                        <option value="JUL">July</option>
                        <option value="AUG">August</option>
                        <option value="SEP">September</option>
                        <option value="OCT">October</option>
                        <option value="NOV">November</option>
                        <option value="DEC">December</option>
                    </select>
                    <button id="btnTest" />
                    Submit
                    </button><br>
                            <?php 
                                echo date("l ", $currentTime);
                                echo '<span id="currenttime">' . date("g:i a", $currentTime) . '</span>'; 
                                echo "<br>";
                             echo date("jS F, Y",$currentTime); ?>
                </div>
                <div class="report-container">
                    <h2><?php echo $data->name; ?> Weather</h2>
                    <div class="time">
                        <div>
                            <?php 
                                echo date("l ", $currentTime);
                                echo '<span id="currenttime">' . date("g:i a", $currentTime) . '</span>'; 
                            ?>
                        </div>
                        <div><?php echo date("jS F, Y",$currentTime); ?></div>
                    </div>
                    <div class="weather-forecast">
                        <img
                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
                            <?php echo $data->main->temp_max; ?>&deg;C
                            <span class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
                    </div>
                    <div class="time">
                        <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
                        <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
                        <div><?php echo ucwords($data->weather[0]->description); ?></div>
                        <?php  echo "<br> main ";
                        echo $data->weather[0]->main;
                        
                        echo "<br> temp ";
                        echo $data->main->temp;
                        echo "<br>feels like ";
                        echo $data->main->feels_like;
                        
                        echo "<br>";
                        
                        echo "<br> humidity ";
                        echo $data->main->humidity;
                        echo "<br> wind speed ";
                        echo $data->wind->speed;
                        echo "<br> wind deg ";
                        echo $data->wind->deg;
                        echo "<br> cloud cover ";
                        echo $data->clouds->all;
                        
                        echo "<br>";
                        
                        echo "<br> sunrise ";
                        echo $data->sys->sunrise;
                        echo "<br> sunset ";
                        echo $data->sys->sunset;
                        
                        echo "<br>";
                        
                        echo "<br> name ";
                        echo $data->name;
                        echo "<br> country ";
                        echo $data->sys->country;
                        echo "<br>";?>
                    </div>
                </div>
                 
                <div class="regular slider">
                    <?php
                        $url = 'https://newsapi.org/v2/top-headlines?country=gb&apiKey=769fc8e52ecb4ed882a06ff77ad01626';
                        $json = file_get_contents($url);
                        $data = json_decode($json);
                        $array = json_decode(json_encode($data), true);
                        $i = 0;
                        $t = 20;
                        while ($i < $t) {
                            if(empty($array['articles'][$i]['urlToImage'])){ }
                            else{
                                echo '<div style="display:flex;">';
                                echo '<a href="' . $array['articles'][$i]['url'] . '"><img src="' . $array['articles'][$i]['urlToImage'] . '" Width="250px"></a>';
                                echo '<div style="padding:0 10px height:100%">';
                                mb_internal_encoding("UTF-8");
                                $limit = strrpos($array['articles'][$i]['title'], "-");
                                $sun = substr_replace($array['articles'][$i]['title'],"",$limit);
                                echo '<h3><a href="' . $array['articles'][$i]['url'] . '">' . $sun . '</a></h3>';
                                echo $array["articles"][$i]["source"]["name"];
                                echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; 
                                echo '</div>';
                                echo '<span class="linktonews"><a href="' . $array['articles'][$i]['url'] . '">Go to Article</a></span>';
                                echo '</div>';
                            }
                        $i++;
                        }
                    ?> 
                </div>
            </section>
            <div style="clear:both; display:block;"></div>
            <div class="container">
                <nav class="mainnav">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Home</a></li>
                        <li><a href="">Home</a></li>
                        <li><a href="">Home</a></li>
                        <li><a href="">Home</a></li>
                        <li><a href="">Home</a></li>
                    </ul>
                </nav>
                <section id="content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget tortor vel magna pharetra consequat. Sed dui dolor, sodales non erat non, pharetra pharetra arcu. Nunc facilisis urna lorem, vel eleifend lacus tristique eu. Sed dapibus in nisl id efficitur. Quisque vehicula sem sit amet facilisis eleifend. Suspendisse tempus leo libero. Maecenas a pellentesque lacus. Cras at lectus metus. Proin nec euismod dolor. Vivamus tempus velit nec ligula porttitor, iaculis bibendum turpis bibendum.
                    </p>
                    <p>
                        Proin dignissim scelerisque dolor in pharetra. Etiam ultricies elit ex, id varius tellus ullamcorper vitae. Donec malesuada id orci sit amet tempor. Fusce commodo nunc libero, ac rhoncus turpis pretium eget. Morbi sed tellus vel felis volutpat viverra et eu sem. Pellentesque turpis nibh, viverra rhoncus nisi in, eleifend consectetur nulla. Nunc interdum vel augue eget fringilla. Vestibulum eget ligula magna. Integer augue mauris, egestas in augue non, posuere scelerisque lorem. Sed posuere, neque id condimentum egestas, tellus est accumsan est, in volutpat diam dolor eget nunc. Aenean vulputate viverra lacus, a scelerisque ligula pulvinar ultricies.
                    </p>
                    <p>
                        Nam vel varius mauris, eget congue felis. Vestibulum hendrerit ut nisl id mollis. Cras consequat viverra massa, varius semper augue finibus ultricies. Fusce consectetur pellentesque leo, dapibus feugiat quam. Integer sodales ipsum sit amet sapien dictum, non hendrerit ante dictum. Maecenas vitae justo eget risus malesuada dictum nec sit amet purus. Etiam vitae diam sit amet metus bibendum rhoncus. Duis ullamcorper arcu laoreet, ultricies elit sit amet, dictum elit.
                    </p>
                    <p>
                        Proin non dolor vel enim finibus consequat vitae et mauris. Nunc at venenatis libero. Morbi eleifend tempor lacus nec fringilla. In tristique sapien et dapibus suscipit. In nec elementum sapien. Morbi a erat sem. Nulla semper dignissim ligula, quis convallis augue aliquam eget. Sed mattis nibh non sem pellentesque, at pellentesque dolor vulputate. Phasellus eu pellentesque mi, ac tincidunt tortor. Fusce eget diam nec massa fermentum varius ac eget dui. Pellentesque turpis metus, efficitur vel ante eget, elementum elementum eros. Phasellus mattis porttitor est ut aliquet. Nunc nec lorem nec risus faucibus tincidunt. Duis vel ex sapien.
                    </p>
                    <p>
                        Morbi rutrum ipsum vel dui varius auctor. Morbi non euismod turpis, nec varius diam. Aenean vitae dictum metus. Sed scelerisque faucibus bibendum. Proin mollis interdum scelerisque. Morbi vehicula nec nulla ut faucibus. Ut faucibus ultrices urna, et ullamcorper elit lacinia at. Nam tristique ligula nulla, vitae congue massa fermentum nec. Cras ut facilisis neque, eget mollis nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu odio purus. Nam lacinia consequat ligula. In sapien purus, lobortis et ex at, pretium rutrum justo.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget tortor vel magna pharetra consequat. Sed dui dolor, sodales non erat non, pharetra pharetra arcu. Nunc facilisis urna lorem, vel eleifend lacus tristique eu. Sed dapibus in nisl id efficitur. Quisque vehicula sem sit amet facilisis eleifend. Suspendisse tempus leo libero. Maecenas a pellentesque lacus. Cras at lectus metus. Proin nec euismod dolor. Vivamus tempus velit nec ligula porttitor, iaculis bibendum turpis bibendum.
                    </p>
                    <p>
                        Proin dignissim scelerisque dolor in pharetra. Etiam ultricies elit ex, id varius tellus ullamcorper vitae. Donec malesuada id orci sit amet tempor. Fusce commodo nunc libero, ac rhoncus turpis pretium eget. Morbi sed tellus vel felis volutpat viverra et eu sem. Pellentesque turpis nibh, viverra rhoncus nisi in, eleifend consectetur nulla. Nunc interdum vel augue eget fringilla. Vestibulum eget ligula magna. Integer augue mauris, egestas in augue non, posuere scelerisque lorem. Sed posuere, neque id condimentum egestas, tellus est accumsan est, in volutpat diam dolor eget nunc. Aenean vulputate viverra lacus, a scelerisque ligula pulvinar ultricies.
                    </p>
                    <p>
                        Nam vel varius mauris, eget congue felis. Vestibulum hendrerit ut nisl id mollis. Cras consequat viverra massa, varius semper augue finibus ultricies. Fusce consectetur pellentesque leo, dapibus feugiat quam. Integer sodales ipsum sit amet sapien dictum, non hendrerit ante dictum. Maecenas vitae justo eget risus malesuada dictum nec sit amet purus. Etiam vitae diam sit amet metus bibendum rhoncus. Duis ullamcorper arcu laoreet, ultricies elit sit amet, dictum elit.
                    </p>
                    <p>
                        Proin non dolor vel enim finibus consequat vitae et mauris. Nunc at venenatis libero. Morbi eleifend tempor lacus nec fringilla. In tristique sapien et dapibus suscipit. In nec elementum sapien. Morbi a erat sem. Nulla semper dignissim ligula, quis convallis augue aliquam eget. Sed mattis nibh non sem pellentesque, at pellentesque dolor vulputate. Phasellus eu pellentesque mi, ac tincidunt tortor. Fusce eget diam nec massa fermentum varius ac eget dui. Pellentesque turpis metus, efficitur vel ante eget, elementum elementum eros. Phasellus mattis porttitor est ut aliquet. Nunc nec lorem nec risus faucibus tincidunt. Duis vel ex sapien.
                    </p>
                    <p>
                        Morbi rutrum ipsum vel dui varius auctor. Morbi non euismod turpis, nec varius diam. Aenean vitae dictum metus. Sed scelerisque faucibus bibendum. Proin mollis interdum scelerisque. Morbi vehicula nec nulla ut faucibus. Ut faucibus ultrices urna, et ullamcorper elit lacinia at. Nam tristique ligula nulla, vitae congue massa fermentum nec. Cras ut facilisis neque, eget mollis nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu odio purus. Nam lacinia consequat ligula. In sapien purus, lobortis et ex at, pretium rutrum justo.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget tortor vel magna pharetra consequat. Sed dui dolor, sodales non erat non, pharetra pharetra arcu. Nunc facilisis urna lorem, vel eleifend lacus tristique eu. Sed dapibus in nisl id efficitur. Quisque vehicula sem sit amet facilisis eleifend. Suspendisse tempus leo libero. Maecenas a pellentesque lacus. Cras at lectus metus. Proin nec euismod dolor. Vivamus tempus velit nec ligula porttitor, iaculis bibendum turpis bibendum.
                    </p>
                    <p>
                        Proin dignissim scelerisque dolor in pharetra. Etiam ultricies elit ex, id varius tellus ullamcorper vitae. Donec malesuada id orci sit amet tempor. Fusce commodo nunc libero, ac rhoncus turpis pretium eget. Morbi sed tellus vel felis volutpat viverra et eu sem. Pellentesque turpis nibh, viverra rhoncus nisi in, eleifend consectetur nulla. Nunc interdum vel augue eget fringilla. Vestibulum eget ligula magna. Integer augue mauris, egestas in augue non, posuere scelerisque lorem. Sed posuere, neque id condimentum egestas, tellus est accumsan est, in volutpat diam dolor eget nunc. Aenean vulputate viverra lacus, a scelerisque ligula pulvinar ultricies.
                    </p>
                    <p>
                        Nam vel varius mauris, eget congue felis. Vestibulum hendrerit ut nisl id mollis. Cras consequat viverra massa, varius semper augue finibus ultricies. Fusce consectetur pellentesque leo, dapibus feugiat quam. Integer sodales ipsum sit amet sapien dictum, non hendrerit ante dictum. Maecenas vitae justo eget risus malesuada dictum nec sit amet purus. Etiam vitae diam sit amet metus bibendum rhoncus. Duis ullamcorper arcu laoreet, ultricies elit sit amet, dictum elit.
                    </p>
                    <p>
                        Proin non dolor vel enim finibus consequat vitae et mauris. Nunc at venenatis libero. Morbi eleifend tempor lacus nec fringilla. In tristique sapien et dapibus suscipit. In nec elementum sapien. Morbi a erat sem. Nulla semper dignissim ligula, quis convallis augue aliquam eget. Sed mattis nibh non sem pellentesque, at pellentesque dolor vulputate. Phasellus eu pellentesque mi, ac tincidunt tortor. Fusce eget diam nec massa fermentum varius ac eget dui. Pellentesque turpis metus, efficitur vel ante eget, elementum elementum eros. Phasellus mattis porttitor est ut aliquet. Nunc nec lorem nec risus faucibus tincidunt. Duis vel ex sapien.
                    </p>
                    <p>
                        Morbi rutrum ipsum vel dui varius auctor. Morbi non euismod turpis, nec varius diam. Aenean vitae dictum metus. Sed scelerisque faucibus bibendum. Proin mollis interdum scelerisque. Morbi vehicula nec nulla ut faucibus. Ut faucibus ultrices urna, et ullamcorper elit lacinia at. Nam tristique ligula nulla, vitae congue massa fermentum nec. Cras ut facilisis neque, eget mollis nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu odio purus. Nam lacinia consequat ligula. In sapien purus, lobortis et ex at, pretium rutrum justo.
                    </p>
                </section>
                <section id="staff" style="padding:30px; color:white; display:block;">
                    <div class="glass" style="padding:10px">
                        <p>
                            Morbi rutrum ipsum vel dui varius auctor. Morbi non euismod turpis, nec varius diam. Aenean vitae dictum metus. Sed scelerisque faucibus bibendum. Proin mollis interdum scelerisque. Morbi vehicula nec nulla ut faucibus. Ut faucibus ultrices urna, et ullamcorper elit lacinia at. Nam tristique ligula nulla, vitae congue massa fermentum nec. Cras ut facilisis neque, eget mollis nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu odio purus. Nam lacinia consequat ligula. In sapien purus, lobortis et ex at, pretium rutrum justo.
                        </p>
                        <p>
                            Morbi rutrum ipsum vel dui varius auctor. Morbi non euismod turpis, nec varius diam. Aenean vitae dictum metus. Sed scelerisque faucibus bibendum. Proin mollis interdum scelerisque. Morbi vehicula nec nulla ut faucibus. Ut faucibus ultrices urna, et ullamcorper elit lacinia at. Nam tristique ligula nulla, vitae congue massa fermentum nec. Cras ut facilisis neque, eget mollis nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu odio purus. Nam lacinia consequat ligula. In sapien purus, lobortis et ex at, pretium rutrum justo.
                        </p>
                        <p>
                            Morbi rutrum ipsum vel dui varius auctor. Morbi non euismod turpis, nec varius diam. Aenean vitae dictum metus. Sed scelerisque faucibus bibendum. Proin mollis interdum scelerisque. Morbi vehicula nec nulla ut faucibus. Ut faucibus ultrices urna, et ullamcorper elit lacinia at. Nam tristique ligula nulla, vitae congue massa fermentum nec. Cras ut facilisis neque, eget mollis nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu odio purus. Nam lacinia consequat ligula. In sapien purus, lobortis et ex at, pretium rutrum justo.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </body>
    <script>
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
          if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
            document.getElementById("header").style.height = "80px";
          } else {
            document.getElementById("header").style.height = "80px";
          }
        }
    </script>
    <script>
        $('#example').select2({
            placeholder: 'Select a month'
        });
        
        $('#btnTest').on('click', function() {
        	$('#example').select2({
                 tags:true,
        	});
        })
        
    </script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https:/philiphendry.com/test/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
          $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            autoplay: true,
            autoplaySpeed: 6000,
            pauseOnHover: true,
            responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
          });
        });
    </script>
    <script>
        setInterval(function() {
            var currentTime = new Date ( );    
            var currentHours = currentTime.getHours ( );   
            var currentMinutes = currentTime.getMinutes ( );   
            var currentSeconds = currentTime.getSeconds ( );
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
            document.getElementById("currenttime").innerHTML = currentTimeString;
        }, 1000);
    </script>
</html>
