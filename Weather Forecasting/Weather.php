<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <script src="https://kit.fontawesome.com/301d42c14e.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff; /* Light cyan background */
            color: #333;
            display: flex;
            flex-direction: column;
            scroll-behavior: smooth;
        }
        /* Header Style */
        header {
    background-image: url('dune.jpg'); /* Ensure this path is correct */
    background-size: cover; /* Ensures the image covers the entire area */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents repeating of the image */
    color: white;
    padding: 20px;
    text-align: center;
    line-height: 100px;
    border-bottom: 4px solid #e8491d;
    height: 300px; /* Adjust this height as needed */
}
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        /* Navigation Bar */
        nav {
            background-color: #333; /* Dark blue */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px;
            position: relative;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            display: inline-block;
        }
        nav a:hover {
            background-color: #FFA500; /* Bright orange on hover */
            color: white;
        }
        /* User Profile */
        .profile-icon {
            color: white;
            font-size: 24px;
            cursor: pointer;
            position: relative;
        }
        /* Popup Profile Modal */
        .profile-popup {
            display: none;
            position: absolute;
            top: 40px;
            right: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            padding: 10px;
            width: 200px;
            z-index: 1000;
        }
        /* Menu icon (hidden by default on large screens) */
        .fa-bars {
            display: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        /* Make the menu collapsible on smaller screens */
        .menu-links {
            display: flex; 
            flex-grow: 1; 
            justify-content:flex-end; 
        }
        
        /* Responsive Styles */
        @media screen and (max-width: 768px) {
          nav {
              flex-direction: column; 
              align-items:flex-start; 
          }
          .menu-links {
              display:none; 
              flex-direction :column; 
              width :100%; 
              justify-content:flex-start; 
              align-items:flex-start; 
          }
          .menu-links.open { display:flex; } /* Show menu items when the class "open" is added */
          .fa-bars { display:block; } /* Show the menu icon on small screens */
          nav a { padding :10px; width :100%; text-align:left; background-color:#5A6F85; } /* Lighter for mobile */
      }

      /* Content Wrapper Layout */
      .content-wrapper {
          display:flex; 
          justify-content :space-between; 
          padding :20px; 
          background-color:#f0f4f7; 
      }

      /* Main Content Section */
      .main-content {
          flex :1; 
          padding-right :20px; 
      }

      .main-content h2 { color:#4A90E2; margin-top :0;}

      .weather-info, .prevention-info { background:white; padding :20px; border-radius :5px; box-shadow :0 0 10px rgba(0,0,0,0.1); margin-bottom :20px;}

      /* Map Section */
      .map-section { margin :20px 0; background-color:white; border-radius :5px; padding :10px; box-shadow :0 0 10px rgba(0,0,0,0.1); }

      .map-section h2 { margin-top :0;}

      /* Right News Sidebar */
      .news-sidebar { width :300px;background-color:#f2f2f2;padding :20px;height :75vh;overflow-y:auto;box-shadow :-2px 0 5px rgba(0, 0, 0, 0.1); }

      .news-sidebar h2 { margin-top :0;font-size :18px;color:#2D3E50;}

      .news-sidebar ul { list-style:none;padding :0;}

      .news-sidebar li {display:flex;align-items:center;margin-bottom :15px;}

      .news-sidebar li img {width :50px;height :50px;margin-right :10px;border-radius :5px;}

      .news-sidebar li a {text-decoration:none;color:#333;font-weight:bold;}

      .news-sidebar li a:hover {color:#4A90E2;}

      /* Weather Forecast Styling */
      .forecast-day {display:inline-block;width :18%;text-align:center;padding :10px;border :1px solid #ddd;margin :1%;background-color:#fff;border-radius :5px;box-shadow :0 0 10px rgba(0, 0, 0, 0.1);}

      /* Footer */
      footer {background-color:#2D3E50;color:white;text-align:center;padding :20px;margin-top :20px;}

      footer h2, footer p {margin :0;}

      .live-weather-button {background-color:#ff0000;color:white;font-size :18px;font-weight:bold;padding :10px 20px;border :2px solid #ff0000;border-radius :5px;cursor:pointer;text-align:center;}
      
     

       .news-item {margin-bottom :20px;}
       
       .news-image {width :100%; height:auto;border-radius :5px;}
       
       .news-item h4 {margin-top :10px;font-size :16px;color:#333;}
       
       .news-item a {text-decoration:none;color:#4A90E2;} 

       .news-item a:hover {text-decoration:none;}
       @keyframes flashing {
    0% { background-color: #ff0000; color: white; }
    50% { background-color: #333; color: #ff0000; }
    100% { background-color: #ff0000; color: white; }
}

.live-weather-button {
    animation: flashing 1s infinite; /* Apply flashing animation */
    color: white;
    font-size: 18px;
    font-weight: bold;
    padding: 10px 20px;
    border: 2px solid #ff0000;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}
    </style>
</head>
<body>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already validated username and password
    $username = htmlspecialchars($_POST['uname']);
    $password = htmlspecialchars($_POST['password']);


}
?>
<nav>
    <div style="display: flex; align-items: center;">
        <img src="logo.png" alt="Logo" style="mix-blend-mode:lighten; height: 50px; margin-right: 10px;"> <!-- Use the new transparent logo -->
        <h2 style="color:white; margin:0;">AccuWeather</h2>
    </div>
    <i class="fa-solid fa-bars" id="menu-icon" onclick="toggleMenu()"></i>
    <div class="menu-links" id="menuLinks">
        <button class="live-weather-button" onclick="window.location.href='index.html'">OUR WEATHER APP IS LIVE</button>
        <a href="#home">Home</a>
        <a href="#blogs">Blogs</a>
        <a href="#guide">Guide</a>
        <a href="#map">Map</a>
        <a href="#contact">About</a>
    </div>

    <i class="fa-solid fa-user profile-icon" onclick="toggleProfilePopup()"></i>
    <div class="profile-popup" id="profilePopup">
    <h4>User Profile</h4>
    <p><strong>Name</strong> <?php  echo $username?> </p>
    <p><strong>Mail:</strong> <?php echo $username?>@gmail.com </p>
    <p><strong>Location:</strong> Amravati</p>
    <button onclick="toggleProfilePopup()">Close</button>
    <button onclick="window.location.href='login_form.php'">Logout</button> <!-- Redirect to login page -->
</div>
</nav>
   <div class="content-wrapper">
       <div class="main-content">
           <header id="home">
               <h1><i class="fa-solid fa-cloud-sun"></i> Weather Forecasting System</h1>
               <p>Your reliable weather companion</p>
           </header>

           <!-- Blogs Section -->
           <section class="weather-info" id="blogs">
               <h2>Blogs</h2>
               <p>Weather Simple provides accurate and timely forecasts from the National Weather Service. With stunning icons and rich typography, it’s easy to navigate for all users. The app supports Dynamic Text and VoiceOver for enhanced accessibility on iOS.</p>

               <h3>Latest Weather Insights</h3>
               <article>
                   <h4>Understanding Weather Patterns</h4>
                   <p>Learn how different weather patterns develop and what they mean for your local forecast. From high-pressure systems to cold fronts, understanding these concepts can help you make informed decisions about your day.</p>
                   <a href="#">Read more...</a>
               </article>

               <article>
                   <h4>Preparing for Severe Weather</h4>
                   <p>Severe weather can strike at any moment. Here are some essential tips on how to prepare for storms, hurricanes, and other extreme weather events to keep you and your family safe.</p>
                   <a href="#">Read more...</a>
               </article>

               <article>
                   <h4>The Impact of Climate Change on Weather</h4>
                   <p>Climate change is altering weather patterns globally. Discover how these changes affect local climates and what you can do to contribute to a more sustainable future.</p>
                   <a href="#">Read more...</a>
               </article>
           </section>

           <!-- Guide Section -->
           <section class="weather-info" id="guide">
               <h2>Weather Guide</h2>
               <p>Our comprehensive guide helps you navigate the complexities of weather forecasting. Whether you're planning a trip or preparing for a storm, this guide will equip you with the knowledge you need.</p>

               <h3>Using Our Weather Forecasting Tools</h3>
               <article>
                   <h4>How to Read Weather Forecasts</h4>
                   <p>Understanding weather forecasts is crucial. Learn how to interpret temperature, precipitation chances, wind speeds, and other key indicators in our daily forecasts.</p>

                   <ul>
                       <li><strong>Temperature:</strong> Indicates the expected warmth or coldness.</li>
                       <li><strong>Precipitation:</strong> Shows the likelihood of rain or snow.</li>
                       <li><strong>Wind Speed:</strong> Important for outdoor activities and safety.</li>
                   </ul>

                   <a href="#">Read more...</a>
               </article>

               <article>
                   <h4>Preparing for Different Weather Conditions</h4>
                   <p>Every season brings unique weather challenges. Here’s how to prepare for summer heatwaves, winter storms, and everything in between:</p>

                   <ul>
                       <li><strong>Summer:</strong> Stay hydrated and avoid outdoor activities during peak heat.</li>
                       <li><strong>Winter:</strong> Ensure your home is winter-ready and stock up on essentials.</li>
                       <li><strong>Spring:</strong> Be alert for thunderstorms and flash floods.</li>
                   </ul>

                   <a href="#">Read more...</a>
               </article>

               <article>
                   <h4>Understanding Severe Weather Alerts</h4>
                   <p>Learn about different types of severe weather alerts (e.g., tornado warnings, flood watches) and what actions to take when they are issued. Staying informed can save lives.</p>

                   <a href="#">Read more...</a>
               </article>

           </section>

           <!-- Live Map Section -->
           <section class="map-section" id="map">
               <h2>Live Weather Map</h2>
               <section class="map-section" id="map">
    <h2>Live Weather Map</h2>
    <iframe src="https://openweathermap.org/weathermap?basemap=map&cities=true&layer=temperature&lat=20.5937&lon=78.9629&zoom=5" width="100%" height="500" allowfullscreen="" loading="lazy"></iframe>
</section>
           </section>
         
           <section>
                <h2>Current Weather & 5-Day Forecast</h2>
                <select id="location-select" class="location-select">
                    <option value="">Select a location</option>
                    <option value="new-york">Amravati</option>
                    <option value="london">Bangalore</option>
                    <option value="tokyo">Chennai</option>
                    <option value="sydney">Guntur</option>
                </select>

                <div id="current-weather"></div>
                <div id="forecast"></div>
            </section>
           
       </div>

       <!-- News Sidebar Section -->
       <aside class="news-sidebar">
           <h1 style="color:#4A90E2">Latest Weather News</h1>

           <!-- News items will be populated here -->
           <article class="news-item">
    <img src="s1.jpg" alt="Weather News 1" class="news-image">
    <h4><a href="#">Severe Flooding in Kerala Displaces Thousands</a></h4>
</article>
<article class="news-item">
    <img src="s2.jpg" alt="Weather News 2" class="news-image">
    <h4><a href="#">Heatwave Conditions Persist in Northern India</a></h4>
</article>
<article class="news-item">
    <img src="s3.jpg" alt="Weather News 3" class="news-image">
    <h4><a href="#">Cyclone Warning Issued for Coastal Regions of Odisha</a></h4>
</article>
<article class="news-item">
    <img src="s4.jpg" alt="Weather News 4" class="news-image">
    <h4><a href="#">Monsoon Arrives Early in Mumbai, Bringing Heavy Rains</a></h4>
</article>
<article class="news-item">
    <img src="s5.jpg" alt="Weather News 5" class="news-image">
    <h4><a href="#">Drought Conditions Affecting Agriculture in Rajasthan</a></h4>
</article>
 <button class="live-weather-button" onclick="window.location.href='index.html'">OUR WEATHER APP IS LIVE</button>
       </aside>

   </div>

   <!-- Footer -->
   <footer id="contact" style="background-color: #333; color: white; padding: 20px;">
    <h1 style="text-align: center; color: white;">About</h1>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div style="flex: 1; display: flex; justify-content: space-around; flex-wrap: wrap;">
            <!-- Product Collections -->
            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h2 style="color: white; margin-bottom: 10px;"><u>Product Collections</u></h2>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none;">Current and Forecast APIs</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Historical Weather Data</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Weather Maps</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Weather Dashboard</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Widgets</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Subscription</a></li>
                </ul>
            </div>

            <!-- How to Start -->
            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h2 style="color: white; margin-bottom: 10px;"><u>How to Start</u></h2>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none;">Pricing</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Subscribe for Free</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">FAQ</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h2 style="color:white;margin-bottom :10px;"><u>Company</u></h2>
                <p style="max-width: 250px;">OpenWeather is a team of IT experts and data scientists that has been practicing deep weather data science. For each point on the globe, OpenWeather provides historical, current, and forecasted weather data via light-speed APIs. Headquarters in London, UK.</p>
            </div>

            <!-- Technologies -->
            <div style="flex: 1; min-width :200px;margin :10px;">
                <h2 style = "color:white;margin-bottom :10px;"><u>Technologies</u></h2>
                <ul style = "list-style:none;padding :0;">
                    <li><a href="#" style = "color:white;text-decoration:none;">Our Technology</a></li>
                    <li><a href="#" style = "color:white;text-decoration:none;">Accuracy and Quality of Weather Data</a></li>
                    <li><a href="#" style = "color:white;text-decoration:none;">Connect your Weather Station</a></li>
                </ul>
            </div>

            <!-- Terms & Conditions -->
            <div style = "display:block ; min-width :200px;margin :10px;">
                <h2 style = "color:white;margin-bottom :10px;"><u>Terms & Conditions</u></h2>
                <ul style = "list-style:none;padding :0;">
                    <li><a href="#"style = "color:white;text-decoration:none;">Terms and Conditions of Sale</a></li>
                    <li><a href="#"style = "color:white;text-decoration:none;">Privacy Policy</a></li>
                    <li><a href="#"style = "color:white;text-decoration:none;">Website Terms and Conditions</a></li>
                </ul>
            </div>

        </div>

        <!-- Vertical Divider -->
        <div style="border-left: 2px solid white; height:auto;"></div>

        <!-- Right Side Content -->
        <div style="flex-basis: 250px; margin-left: 20px;">
            <!-- Social Media Icons -->
            <div style="text-align:center;margin-top :30px;">
                <h3><u>Follow Us</u></h3>
                <a href="#"><i class="fab fa-github"style = "font-size :24px;color:white;margin-right :15px;"></i></a>
                <a href="#"><i class="fab fa-linkedin"style = "font-size :24px;color:white;margin-right :15px;"></i></a>
                <a href="#"><i class="fab fa-facebook"style = "font-size :24px;color:white;margin-right :15px;"></i></a>
                <a href="#"><i class="fab fa-instagram"style = "font-size :24px;color:white;"></i></a>
            </div>

            <!-- Contact Information -->
            <div style="text-align:center;margin-top :30px;">
                <h3><u>Contact Us</u></h3>
                <p>Email: info@weathersimple.com</p>
                <p>Phone: +1 (555) 123-4567</p>
                <p>&copy; 2024 Weather Simple. All rights reserved.</p>
            </div>
        </div>

    </div> 
</footer> 
   <!-- JavaScript Functions -->
   <!-- Add relevant JavaScript functions here -->

   <!-- Example JavaScript functions for interactivity -->
    <script>
  
  const locations = {
            'new-york': { name: 'New York', temp: 22, windSpeed: 5, windGust: 8, humidity: 60, pressure: 1013 },
            'london': { name: 'London', temp: 18, windSpeed: 4, windGust: 6, humidity: 70, pressure: 1011 },
            'tokyo': { name: 'Tokyo', temp: 26, windSpeed: 3, windGust: 5, humidity: 65, pressure: 1012 },
            'sydney': { name: 'Sydney', temp: 20, windSpeed: 6, windGust: 9, humidity: 55, pressure: 1010 }
        };

        function updateWeather(location) {
            const currentWeather = document.getElementById('current-weather');
            const forecast = document.getElementById('forecast');
            
            if (location) {
                const data = locations[location];
                currentWeather.innerHTML = `
                    <h3>Current Weather in ${data.name}</h3>
                    <p>Temperature: ${data.temp}°C</p>
                    <p>Wind Speed: ${data.windSpeed} m/s</p>
                    <p>Wind Gust: ${data.windGust} m/s</p>
                    <p>Humidity: ${data.humidity}%</p>
                    <p>Pressure: ${data.pressure} hPa</p>
                `;

                let forecastHTML = '<h3>5-Day Forecast</h3>';
                for (let i = 1; i <= 5; i++) {
                    forecastHTML += `
                        <div class="forecast-day">
                            <h4>Day ${i}</h4>
                            <p>Temp: ${Math.round(data.temp + Math.random() * 5 - 2)}°C</p>
                            <p>Humidity: ${Math.round(data.humidity + Math.random() * 10 - 5)}%</p>
                        </div>
                    `;
                }
                forecast.innerHTML = forecastHTML;
            } else {
                currentWeather.innerHTML = '<p>Please select a location</p>';
                forecast.innerHTML = '';
            }
        }

        document.getElementById('location-select').addEventListener('change', function() {
            updateWeather(this.value);
        });

        // Initialize with empty state
        updateWeather('');

        function toggleMenu() {
            var menuLinks = document.getElementById('menuLinks');
            menuLinks.classList.toggle('open');
        }

        function toggleProfilePopup() {
            var profilePopup = document.getElementById('profilePopup');
            profilePopup.style.display = profilePopup.style.display === 'block' ? 'none' : 'block';
        }
</script>

</body></html>
