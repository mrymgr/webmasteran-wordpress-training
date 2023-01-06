const storage = new msnStorage()
const weather = new Weather(storage.getLocationData().city, storage.getLocationData().state)
const ui = new UI()

let getWeather = () => {
  weather
  .getWeather()
  .then((result) => {
    //console.log(result)
    ui.paint(result, weather.Location)

  })
  .catch((err) => console.log(err))
}
 
let changeLocation = () => {
  const city = document.getElementById('city').value
  const state = document.getElementById('state').value
  weather.changeLocation(city, state)
  getWeather()
  $('#locationModal').modal('hide')
  storage.setLocationData(city, state)
} 

document.addEventListener('DOMContentLoaded', getWeather)
document.getElementById('w-change-btn').addEventListener('click', changeLocation)



