class msnStorage {
  constructor() {
    this.city
    this.state
    this.defaultCity = 'تهران'
    this.defaultState = 'تهران'
  }

  getLocationData() {
    if( localStorage.getItem('msnSampleJSCity') === null) {
      this.city = this.defaultCity
    } else {
      this.city = localStorage.getItem('msnSampleJSCity')
    }

    if( localStorage.getItem('msnSampleJSState') === null) {
      this.state= this.defaultState
    } else {
      this.state = localStorage.getItem('msnSampleJSState')
    }
    return {
      city: this.city,
      state: this.state
    }
    
  }

  setLocationData(city, state) {
    localStorage.setItem('msnSampleJSCity', city)
    localStorage.setItem('msnSampleJSState', state)
  }
}