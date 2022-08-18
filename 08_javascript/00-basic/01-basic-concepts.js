/*
 * running app.js from console
 * ===========================
 * use from this command:
 * node app.js
 *
 * */

/*
 * define variable
 * ================
 * */
let variableName = "value"
var variableName2 = 20

/*
 * define function
 * ===============
 * */

let functionName = function (arg1 = value, arg2 = null) {
  //code block
}

/*
 * Template string
 * ===============
 * */

let getUserInfo = function (name, id) {
  return `Name: ${name} - ID: ${id}`
}

let showResult = getUserInfo("gholam", "ghanbari")
console.log(showResult)

/*
 * Define object
 * ==============
 * */

let userInfo = {
  userId: 22,
  userName: "gholam",
  role: "Admin",
}

//access to properties in object
console.log(`User role is: ${userInfo.role}`)

//Working with methods
let course = {
  name: "gholam shenasi",
  studentLimit: 30,
  studentCount: 15,
  checkAvailability: function (courseSize) {
    let leftCount = this.studentLimit - this.studentCount
    return courseSize <= leftCount
  },
}

console.log(course.checkAvailability(20))

/*
 * String methods
 * ==============
 * */

let fullName = "Gholam Ghanbari"
//get string length
console.log(fullName.length)

//find a substring inside a string
let password = "gholam123"
console.log(password.includes("gholam"))

//remove space from left & right + replace in a string
let email = "  gholam@gmail.com      "
console.log(`String length is:${email.length} and original string is: '${email.replace(/\s/g, "*")}'`)
console.log(`String length is:${email.trim().length} and trim string is: '${email.trim().replace(/\s/g, "*")}'`)
console.log(`String length is:${email.trimRight().length} and trim right string is: '${email.trimRight().replace(/\s/g, "*")}'`)
console.log(`String length is:${email.trimLeft().length} and trim left string is: '${email.trimLeft().replace(/\s/g, "*")}'`)
console.log(`String length is:${email.trimStart().length} and trim start string is: '${email.trimStart().replace(/\s/g, "*")}'`)

/*
 * Number methods
 * ==============
 * */

let num = 12.797
//fixed fraction
console.log(num.toFixed(2))
console.log(num.toFixed(5))

//Some practical Math methods
//round methods
console.log(Math.round(num))
console.log(Math.floor(num))
console.log(Math.ceil(num))

//random number between 0 and 1
console.log(Math.random())

//random number between 10 and 20
let num1 = 10
let num2 = 20
console.log(Math.floor(Math.random() * (num2 - num1)) + num1)

/*
 * Define constant
 * ===============
 * */
const isUser = true
const userData = {
  id: 2,
}
userData.id = 3

/*
 * for loop
 * =============
 * */

for (let count = 3; count < 10; count++) {
  console.log(count)
}

/*
 * Array & related methods
 * =======================
 * */

const tasks = ["Task1", "Task2", 12, true]
console.log(tasks.length)
console.log(tasks[0])

const cartItems = ["Book1", "Book2", "Book3", "Book4"]
let result = `You have ${cartItems.length} products in your cart`
let firstCartItem = `First item in your cart is: ${cartItems[0]}`
let lastCartItem = `Last item in your cart is: ${cartItems[cartItems.length - 1]}`
console.log(result)
console.log(firstCartItem)
console.log(lastCartItem)

//add item in the end of array
cartItems.push("Book5")
console.log(cartItems)
//remove item from end of array
cartItems.pop()
console.log(cartItems)
//add item in the beginning of array
cartItems.unshift("First Item")
console.log(cartItems)
//remove item from the beginning of array
cartItems.shift()
console.log(cartItems)

//splice array from position with count
console.log(cartItems.splice(0, 2, "New Item 1"))
console.log(cartItems)
cartItems[2] = "New Item 2"
console.log(cartItems)

//foreach in array
cartItems.forEach(function (item, index) {
  console.log(`In index ${index} of cart items locates ${item}`)
})

//use for loop for array
for (let count = 0; count < cartItems.length; count++) {
  const rowCount = count + 1
  console.log(`${rowCount}- Product Name: ${cartItems[count]}`)
}

//Search in array with indexOf
console.log(cartItems.indexOf("Book2"))
//return -1 if it doesn't exist or return array index if it exists

//using findIndex for customized search in array (return index of array when find searched item)
const cartItems1 = [
  {
    title: "book 1",
    price: 50,
  },
  {
    title: "book 2",
    price: 30,
  },
  {
    title: "book 3",
    price: 30,
  },
  {
    title: "book 4",
    price: 40,
  },
]

const indexValue = cartItems1.findIndex(function (item, index) {
  return item.title === "book 4"
})
console.log(indexValue)

//or using like this in the following
const findProducts = function (cartItems, productTitle) {
  const indexValue = cartItems.findIndex(function (item, index) {
    return item.title.toLowerCase() === productTitle.toLowerCase()
  })
  return cartItems[indexValue]
}

const result1 = findProducts(cartItems1, "BOok 4")
console.log(result1)

//find method: return item when find searched item

const findResult = cartItems1.find(function (item, index) {
  return item.title.toLowerCase() === "book 3"
})

console.log(findResult)

//or

const findProducts1 = function (cartItems, productTitle) {
  return cartItems.find(function (item, index) {
    return item.title.toLowerCase() === productTitle.toLowerCase()
  })
}

const result2 = findProducts1(cartItems1, "BOok 4")
console.log(result2)

//remove an item in an array with findIndex
const deleteProduct = function (cartItems, removeItem) {
  const deleteIndex = cartItems.findIndex(function (item, index) {
    return item.title.toLowerCase() === removeItem.toLowerCase()
  })
  if (deleteIndex !== -1) {
    cartItems1.splice(deleteIndex, 1)
    return cartItems1
  }
  return cartItems1
}

const removedArrayResult = deleteProduct(cartItems1, "book 2")
console.log(removedArrayResult)

//filter method
const numbers1 = [20, 11, 9, 8, 33, 12, 5, 4]
const numbersGreaterThan10 = numbers1.filter(function (item, index) {
  return item >= 10
})
console.log(numbersGreaterThan10)

//another sample for filter method: find products in a list that does not exist in cartItems2
const cartItems2 = [
  {
    title: "book 1",
    exist: true,
  },
  {
    title: "book 2",
    exist: false,
  },
  {
    title: "book 3",
    exist: true,
  },
  {
    title: "book 4",
    exist: false,
  },
]

const productNotExist = function (products) {
  return cartItems2.filter(function (item, index) {
    //return item.exist === false
    return !item.exist
  })
}

console.log(productNotExist(cartItems2))

//Sort in array
//return exist products first
const sortProduct = function (products) {
  products.sort(function (a, b) {
    if (a.exist === true && b.exist === false) {
      return -1
    } else if (b.exist === true && a.exist === false) {
      return 1
    } else {
      return 0
    }
  })
}

sortProduct(cartItems2)
console.log(cartItems2)

//Example: summary of an account with income and outcome
const account = {
  name: "Mehdi",
  outgo: [],
  income: [],
  addOutGo: function (type, value) {
    this.outgo.push({
      type: type,
      value: value,
    })
  },
  addIncome: function (type, value) {
    this.income.push({
      type: type,
      value: value,
    })
  },
  getAccountSummary: function () {
    let outGoSummary = 0
    let incomeSummary = 0
    this.income.forEach(function (item, index) {
      incomeSummary += item.value
    })
    this.outgo.forEach(function (item, index) {
      outGoSummary += item.value
    })
    return incomeSummary - outGoSummary
  },
}

account.addOutGo("cafe", 60)
account.addOutGo("book", 50)
account.addIncome("job", 100)
account.addIncome("job", 200)

console.log(`The summary of account is: ${account.getAccountSummary()}`)

/*
 * Event listener
 * ==============
 * */

//To access to element it's clicked, you can use e.target like in the following:
document.querySelector("button").addEventListener("click", function (e) {
  //console.log(e)
  e.target.textContent = "Add Samples"
})

//remove all element with product class in DOM
document.getElementById("remove-all-product").addEventListener("click", function (e) {
  document.querySelectorAll(".product").forEach(function (item, index) {
    item.remove()
  })
})

//change event vs input event: for change, you must get out the input to see the events but in input, you can see
// changes whenever you type something
document.getElementById("search-products").addEventListener("change", function (e) {
  console.log(e.target.value)
})

document.getElementById("search-products").addEventListener("input", function (e) {
  console.log(e.target.value)
})

//Simple search in an array and show result in dom

const products = [
  {
    title: "Gholam is the best js",
  },
  {
    title: "You don't know js: this & object",
  },
  {
    title: "Functional gholam programming",
  },
  {
    title: "You don't know js: Async & Performance",
  },
]

const filters = {
  searchItem: "",
}
const renderProducts = function (products, filters) {
  const filterProducts = products.filter(function (item, index) {
    return item.title.toLowerCase().includes(filters.searchItem.toLowerCase())
  })
  document.querySelector(".product-list").innerHTML = ""
  filterProducts.forEach(function (item, index) {
    const pProductTag = document.createElement("p")
    pProductTag.textContent = item.title
    document.querySelector(".product-list").appendChild(pProductTag)
  })
}

document.getElementById("search-products").addEventListener("input", function (e) {
  filters.searchItem = e.target.value
  renderProducts(products, filters)
})

//Performance tradeoffs of querySelector & querySelectorAll & getElementById
// https://dev.to/wlytle/performance-tradeoffs-of-queryselector-and-queryselectorall-1074
// https://gomakethings.com/javascript-selector-performance/

//sample of prevent default in form:
document.getElementById("add-product-form").addEventListener("submit", function (e) {
  e.preventDefault()
  console.log(e.target.elements.productTitle.value)
  e.target.elements.productTitle.value = ""
})

/*
 * sample: input box to add products on DOM & show search result on it
 * sample-01 & sample-02 in this directory
 *
 * */

/*
 * using checkbox in JavaScript
 * */

document.querySelector("#checkbox").addEventListener("change", function (e) {
  if (e.target.checked) {
    console.log("You have checked this checkbox")
  } else {
    console.log("You have unchecked this checkbox")
  }
})

//Only show available products with checking a checkbox: sample-03

/*
 * CRUD in local storage
 * ====================
 * You should use from localStorage object and related methods like:
 * setItem, getItem, removeItem, clear
 *
 * To save json data in local storage you must use JSON.stringify(key,value)
 * To get json data from local storage you must use JSON.parse(key)
 * */

//Save data in localStorage
jsonProduct = JSON.stringify(products)
localStorage.setItem("products", jsonProduct)

//Get data and work on it from localStorage
const jsonProductsFromLocalStorage = localStorage.getItem("products")
const tempProducts = JSON.parse(jsonProductsFromLocalStorage)
tempProducts.forEach(function (item, index) {
  console.log(`${index + 1}- Book title is: ${item.title} and it is ${item.exists === true ? "exists" : "not exists"}`)
})

//See sample 04: like sample 03 and save all products in localStorage

/*
 * create random id
 * ==================
 * using: https://www.npmjs.com/package/uuid
 *        https://github.com/uuidjs/uuid
 * */

/*
 * Get current url
 * ===============
 * using: location object
 * to get value after # in url: location.hash.substring(1)
 * another important attributes in location object:
 * host, hostname, href, origin, pathname, port, protocol, hash
 *
 * To redirect to specific url: location.assign(url)
 *
 * */

/*
 * live update in all of tabs in browser window
 * ===========================================
 * To have live update on all of open tabs, you can use from window object.
 * There is simple sample about it in the following (in this example I used from localstorage:
 *
 * */

window.addEventListener("storage", function (e) {
  if (e.key === "products") {
    products2 = JSON.parse(e.newValue)
    product = products2.find(function (item) {
      return item.id === productId
    })
    if (product === undefined) {
      location.assign("/index.html")
    }

    titleElement.value = product.title
    priceElement.value = product.price
  }
})

window.addEventListener("storage", function (e) {
  if (e.key === "products") {
    products1 = JSON.parse(e.newValue)
    renderProducts(products1, filters)
  }
})

/*
 * Date and time
 * =============
 * crate an object from Date class: new Date() //prepare full date
 * useful method in date object: getFullYear, getMonth, getDate, getHours, getMinutes, getSeconds
 *
 * One of the best library to handle date & time with persian support is momentjs.
 * you can go to its site and read the related documents to use it simply.
 * To use Jalali calendar, you must use from jalali-moment in github.
 *
 * */
//create a Date object from local machine time using 'now'
const timestamp = now.getTime()
const myDate = new Date(timestamp)

//using jalali date in momentjs
const now = moment()
now.locale("fa")
console.log(now.format("MMMM DO YYYY, h:mm:ss a"))

//have timestamp (with valueOf() in momentjs)
const timestamp2 = moment().valueOf()
dateElement.textContent = `Last Edit: ${moment(product.updated).locale("fa").fromNow()}`

//sorting by e.g. edited date
const sortProducts = function (products, sortBy) {
  if (sortBy === "byEdited") {
    return products.sort(function (a, b) {
      if (a.updated > b.updated) {
        return -1
      } else if (a.updated < b.updated) {
        return 1
      } else {
        return 0
      }
    })
  } else if (sortBy === "byCreated") {
    return products.sort(function (a, b) {
      if (a.created > b.created) {
        return -1
      } else if (a.created < b.created) {
        return 1
      } else {
        return 0
      }
    })
  } else {
    return products
  }
}

/*
 * Arrow function
 * ==============
 * */
const productName = (title) => {
  return title
}

//another sample:
const filteredProducts = products.filter((item) => {
  return (item.exists = true)
})

//single line return with arrow functions for above examples
const productName1 = (title) => title
const filteredProducts1 = products.filter((item) => item.exists === true)

//Arrow function can not use with this. So you must define object with ES5 syntax

/*
 * Error handling
 * =============
 * We have 2 option to handle errors in JS. First is sending throw exception in your code.
 * Second is using try/catch block
 * */

//using throw Error object
const getPrice = (amount) => {
  if (typeof amount === "number") {
    return amount
  } else {
    throw Error("Amount must be number!")
  }
}

//using try/catch block

const getSaveProducts = () => {
  const productJSON = localStorage.getItem("products")
  //now you must parse (with JSON.parse) it and maybe you can not parse it
  try {
    return productJSON !== null ? JSON.parse(productJSON) : []
  } catch (e) {
    return []
  }
}

/*
 * OOP
 * ====
 * Old methods vs new method with class keyword
 * */

//Old way to have several objects
const User1 = function (email, id) {
  this.email = email
  this.id = id
}

User1.prototype.userInfo = function () {
  return `ID: ${this.id} - Email: ${this.email}`
}

const userName = new User1("gholam@gmail.com", 2)
console.log(userName.userInfo())

//New way to define class
class User {
  constructor(id, email) {
    this.id = id
    this.email = email
  }

  userInfo() {
    return `ID: ${this.id} - Email: ${this.email}`
  }
}

const userName1 = new User("gholam1@gmail.com", 2)
console.log(userName1.userInfo())

//sub class & inheritance
class Job extends User {
  constructor(id, email, jobTitle) {
    super(id, email)
    this.jobTitle = jobTitle
  }
}

//getter & setter in objects
const product3 = {
  title: "book 1",
  price: 79,
  get productInfo() {
    return `Title: ${this.title} - Price: ${this.price}`
  },
  set productInfo(value) {
    const parts = value.split(" ")
    this.title = parts[0]
    this.price = parts[1]
  },
}

product3.productInfo = "Book5 59"
console.log(product3.productInfo)

// getter & setter in a class
class User2 {
  constructor(id, email) {
    this.id = id
    this.email = email
  }

  get userInfo() {
    return `ID: ${this.id} - Email: ${this.email}`
  }
  set userInfo(value) {
    const parts = value.split(" ")
    this.id = parts[0]
    this.email = parts[1]
  }
}

const userName3 = new User2(2, "gholam1@gmail.com")
userName3.userInfo = "3 gholameh@gmail.com"
console.log(userName3)

/*
 * Asynchronous in JavaScript
 * ==========================
 * To do asynchronous in JS, you have 3 ways: callback function (old way), promise & async
 *
 * */

//Example with callback

const products3 = [
  {
    title: "book 1",
    price: 30,
  },
  {
    title: "book 2",
    price: 40,
  },
  {
    title: "book 3",
    price: 50,
  },
]

getProducts = () => {
  setTimeout(() => {
    const fetchProducts = products3.map((item) => {
      return `Product title: ${item.title} - Product price: ${item.price}`
    })
    console.log(fetchProducts)
  }, 2000)
}

createProduct = (callback) => {
  setTimeout(() => {
    products3.push({
      title: "book 4",
      price: 90,
    })
    callback()
  }, 3000)
}

createProduct(getProducts)

//Using promises to have asynchronous execution

createProduct1 = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      products3.push({
        title: "book 4",
        price: 90,
      })
      const error = false
      if (!error) {
        resolve()
      } else {
        reject("Error")
      }
    }, 3000)
  })
}

createProduct1()
  .then(getProducts)
  .catch((err) => {
    console.log(err)
  })

//Using async-await: only need to use await function
async function getData1() {
  await createProduct1()
  getProducts()
}

getData1()

/*
 * Ajax
 * =====
 *
 * Some resources to create json placeholder for your project:
 * https://jsonplaceholder.typicode.com/
 * https://jsonplaceholder.ir/  Persian json placeholder
 * https://www.npmjs.com/package/json-server
 * https://reqres.in/
 *
 * Promise based HTTP client for the browser and node.js:
 * https://www.npmjs.com/package/axios
 *
 *
 *
 * */

//simple ajax request & response

const getBtn = document.getElementById("get-btn")

const getData = () => {
  const xhr = new XMLHttpRequest()
  xhr.open("GET", "https://jsonplaceholder.typicode.com/posts/1")
  xhr.responseType = "json"
  xhr.onload = () => {
    console.log(xhr.response)
    console.log(xhr.response.id)
    console.log(xhr.response.title)
    console.log(xhr.response.userId)
    console.log(xhr.response.body)
  }
  xhr.send()
}

getBtn.addEventListener("click", getData)

//Ajax request with using promise in above sample
const sendHttpRequest = (method, url) => {
  const promise = new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest()
    xhr.open(method, url)
    xhr.responseType = "json"
    xhr.onload = () => {
      resolve(xhr.response)
    }
    xhr.onerror = () => {
      reject("Error")
    }
    xhr.send()
  })
  return promise
}

const getData2 = () => {
  sendHttpRequest("GET", "https://jsonplaceholder.typicode.com/posts/1")
    .then((res) => {
      console.log(res)
    })
    .catch((err) => {
      console.log(err)
    })
}

getBtn.addEventListener("click", getData2)

//using async await for ajax
const sendHttpRequest1 = (method, url, data) => {
  const promise = new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest()
    xhr.open(method, url)
    xhr.responseType = "json"
    if (data) {
      xhr.setRequestHeader("Content-Type", "application/json")
    }
    xhr.onload = () => {
      resolve(xhr.response)
    }
    xhr.onerror = () => {
      reject("Error")
    }
    xhr.send(JSON.stringify(data))
  })
  return promise
}

const postData = () => {
  sendHttpRequest1("POST", "https://jsonplaceholder.typicode.com/posts", {
    userId: 5,
    id: 5,
    title: "Test title",
    body: "Test body",
  })
    .then((res) => {
      console.log(res)
    })
    .catch((err) => {
      console.log(err)
    })
}

//send ajax request with fetch api

const getData1 = () => {
  fetch('https://jsonplaceholder.typicode.com/posts/1')
    .then(res => {
      return res.json()
    })
    .then(responseData => {
      console.log(responseData)
    })
}

//send post and get with fetch api
const sendHttpRequest3 = (method, url, data) => {
  return fetch(url)
    .then((res) => {
      return res.json()
    })
    .catch((err) => {
      return console.log(err)
    })
}

const getData1 = () => {
  sendHttpRequest3("GET", "https://jsonplaceholder.typicode.com/posts/1").then((responseData) => {
    console.log(responseData)
  })
}


getBtn.addEventListener("click", getData1)
postBtn.addEventListener("click", postData1)



