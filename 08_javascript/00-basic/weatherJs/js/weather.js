class Weather {
  constructor(city, state) {
    this.apiKey = "66817dcee63fbfe359c02b62dbf4a849"
    this.city = city
    this.state = state
  }

  async getWeather() {
    const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${this.city},${this.state}&appid=${this.apiKey}`)
    if (response.ok) {
      const responseData = await response.json()
      return responseData
    } else {
      const responseErrorData = await response.json()
      let errorMessage = `Error code:${responseErrorData.cod}!!! ${responseErrorData.message}`
      throw Error(errorMessage)
    }
  }

  changeLocation(city, state) {
    this.city = city
    this.state = state
  }
}
