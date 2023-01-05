const weather = new Weather("تهران", "تهران")
const ui = new UI()

let getWeather = () => {
  weather
  .getWeather()
  .then((result) => {
    console.log(result)
    ui.paint(result, weather.getLocation())

  })
  .catch((err) => console.log(err))
}

document.addEventListener('DOMContentLoaded', getWeather)
weather.changeLocation('اصفهان', 'اصفهان')


