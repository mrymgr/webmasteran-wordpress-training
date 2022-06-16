
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
let variableName = 'value'
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

let getUserInfo = function ( name , id) {
  return `Name: ${name} - ID: ${id}`
}

let showResult = getUserInfo('gholam', 'ghanbari')
console.log(showResult)

/*
* Define object
* ==============
* */

let userInfo = {
  userId: 22,
  userName: 'gholam',
  role: 'Admin'
}

//access to properties in object
console.log(`User role is: ${userInfo.role}`)

//Working with methods
let course = {
  name: 'gholam shenasi',
  studentLimit: 30,
  studentCount: 15,
  checkAvailability: function (courseSize) {
    let leftCount = this.studentLimit - this.studentCount
    return courseSize <= leftCount
  }
}

console.log(course.checkAvailability(20));

/*
* String methods
* ==============
* */

let fullName = 'Gholam Ghanbari'
//get string length
console.log(fullName.length)

//find a substring inside a string
let password = 'gholam123'
console.log(password.includes('gholam'))

//remove space from left & right + replace in a string
let email = '  gholam@gmail.com      '
console.log(`String length is:${email.length} and original string is: '${email.replace(/\s/g,'*')}'`)
console.log(`String length is:${email.trim().length} and trim string is: '${email.trim().replace(/\s/g,'*')}'`)
console.log(`String length is:${email.trimRight().length} and trim right string is: '${email.trimRight().replace(/\s/g,'*')}'`)
console.log(`String length is:${email.trimLeft().length} and trim left string is: '${email.trimLeft().replace(/\s/g,'*')}'`)
console.log(`String length is:${email.trimStart().length} and trim start string is: '${email.trimStart().replace(/\s/g,'*')}'`)

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
console.log(Math.random());

//random number between 10 and 20
let num1 = 10
let num2 = 20
console.log(Math.floor(Math.random()*(num2 - num1))  + num1)

/*
* Define constant
* ===============
* */
const isUser = true
const userData = {
  id: 2
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

const tasks = ['Task1', 'Task2', 12, true]
console.log(tasks.length)
console.log(tasks[0])

const cartItems = ['Book1', 'Book2', 'Book3', 'Book4']
let result = `You have ${cartItems.length} products in your cart`
let firstCartItem = `First item in your cart is: ${cartItems[0]}`
let lastCartItem = `Last item in your cart is: ${cartItems[cartItems.length -1]}`
console.log(result)
console.log(firstCartItem)
console.log(lastCartItem)

//add item in the end of array
cartItems.push('Book5')
console.log(cartItems)
//remove item from end of array
cartItems.pop()
console.log(cartItems)
//add item in the beginning of array
cartItems.unshift('First Item')
console.log(cartItems)
//remove item from the beginning of array
cartItems.shift()
console.log(cartItems)

//splice array from position with count
console.log(cartItems.splice(0,2, 'New Item 1'))
console.log(cartItems)
cartItems[2] = 'New Item 2'
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
console.log(cartItems.indexOf('Book2'))
//return -1 if it doesn't exist or return array index if it exists

//using findIndex for customized search in array (return index of array when find searched item)
const cartItems1 = [
  {
    title: 'book 1',
    price: 50
  },
  {
    title: 'book 2',
    price: 30
  },
  {
    title: 'book 3',
    price: 30
  },
  {
    title: 'book 4',
    price: 40
  }
]

const indexValue = cartItems1.findIndex(function (item, index) {
  return item.title === 'book 4'
})
console.log(indexValue)

//or using like this in the following
const findProducts = function (cartItems, productTitle) {

  const indexValue = cartItems.findIndex(function (item, index) {
    return item.title.toLowerCase() === productTitle.toLowerCase()
  })
  return cartItems[indexValue]
}

const result1 = findProducts(cartItems1, 'BOok 4')
console.log(result1)


//find method: return item when find searched item

const findResult = cartItems1.find(function (item, index) {
  return item.title.toLowerCase() === 'book 3'
})

console.log(findResult)

//or

const findProducts1 = function (cartItems, productTitle) {

  return  cartItems.find(function (item, index) {
    return item.title.toLowerCase() === productTitle.toLowerCase()
  })
}

const result2 = findProducts1(cartItems1, 'BOok 4')
console.log(result)


//remove an item in an array with findIndex
const deleteProduct = function (cartItems, removeItem) {
  const deleteIndex = cartItems.findIndex(function (item, index){
    return item.title.toLowerCase() === removeItem.toLowerCase()
  })
  if ( deleteIndex !== -1 ) {

    cartItems1.splice(deleteIndex,1)
    return cartItems1
  }
  return cartItems1
}

const removedArrayResult = deleteProduct(cartItems1, 'book 2')
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
    title: 'book 1',
    exist: true
  },
  {
    title: 'book 2',
    exist: false
  },
  {
    title: 'book 3',
    exist: true
  },
  {
    title: 'book 4',
    exist: false
  }
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
  name: 'Mehdi',
  outgo: [],
  income: [],
  addOutGo: function (type, value) {
    this.outgo.push(
      {
        'type': type,
        'value': value,
      }
    )
  },
  addIncome: function (type, value) {
    this.income.push(
      {
        'type': type,
        'value': value,
      }
    )
  },
  getAccountSummary: function (){
    let outGoSummary = 0
    let incomeSummary = 0
    this.income.forEach(function (item, index) {
      incomeSummary += item.value
    })
    this.outgo.forEach(function (item, index) {
      outGoSummary += item.value
    })
    return incomeSummary - outGoSummary
  }
}

account.addOutGo('cafe', 60)
account.addOutGo('book', 50)
account.addIncome('job', 100)
account.addIncome('job', 200)


console.log(`The summary of account is: ${account.getAccountSummary()}`)


/*
* Event listener
* ==============
* */

//To access to element it's clicked, you can use e.target like in the following:
document.querySelector('button').addEventListener('click', function (e) {
  //console.log(e)
  e.target.textContent = 'Add Samples'
})

//remove all element with product class in DOM
document.getElementById('remove-all-product').addEventListener('click',function (e){
  document.querySelectorAll('.product').forEach(function (item, index) {
    item.remove()
  })
})


//change event vs input event: for change, you must get out the input to see the events but in input, you can see
// changes whenever you type something
document.getElementById('search-products').addEventListener('change', function (e) {
  console.log(e.target.value)
})

document.getElementById('search-products').addEventListener('input', function (e) {
  console.log(e.target.value)
})


//Simple search in an array and show result in dom

const products = [{
  title: 'Gholam is the best js'
}, {
  title: 'You dont know js: this & object',
}, {
  title: 'Functional gholam programming'
}, {
  title: 'You dont know js: Async & Performance'
}]

const filters = {
  searchItem: ''
}
const renderProducts = function (products, filters) {
  const filterProducts = products.filter(function (item, index){
    return item.title.toLowerCase().includes(filters.searchItem.toLowerCase())
  })
  document.querySelector('.product-list').innerHTML = ''
  filterProducts.forEach(function (item, index) {
    const pProductTag = document.createElement('p')
    pProductTag.textContent = item.title
    document.querySelector('.product-list').appendChild(pProductTag)
  })
}

document.getElementById('search-products').addEventListener('input', function (e){
  filters.searchItem = e.target.value
  renderProducts(products, filters)
})


//Performance tradeoffs of querySelector & querySelectorAll & getElementById
// https://dev.to/wlytle/performance-tradeoffs-of-queryselector-and-queryselectorall-1074
// https://gomakethings.com/javascript-selector-performance/


//sample of prevent default in form:
document.getElementById('add-product-form').addEventListener('submit', function (e) {
  e.preventDefault()
  console.log(e.target.elements.productTitle.value)
  e.target.elements.productTitle.value = ''
})





