function fetchWeather() {
    const cityInput = document.getElementById('cityInput');
    const city = cityInput.value.trim();

    if (city === '') {
        alert('Please enter a city name.');
        return;
    }

    // Simulate fetching weather data (replace this with actual API call)
    const weatherData = {
        description: 'Clear sky',
        temperature: '25°C',
        humidity: '50%',
        wind_speed: '5 m/s'
    };

    displayWeather(weatherData);
}

function displayWeather(weatherData) {
    const weatherInfoDiv = document.getElementById('weatherInfo');

    weatherInfoDiv.innerHTML = `
        <p><strong>Description:</strong> ${weatherData.description}</p>
        <p><strong>Temperature:</strong> ${weatherData.temperature}</p>
        <p><strong>Humidity:</strong> ${weatherData.humidity}</p>
        <p><strong>Wind Speed:</strong> ${weatherData.wind_speed}</p>
    `;

    weatherInfoDiv.style.display = 'block';
}