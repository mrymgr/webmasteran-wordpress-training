const weather = new Weather("تهران", "تهران")


let getWeather = () => {
  weather
  .getWeather()
  .then((result) => console.log(result))
  .catch((err) => console.log(err))
}

document.addEventListener('DOMContentLoaded', getWeather)
weather.changeLocation('اصفهان', 'اصفهان')


