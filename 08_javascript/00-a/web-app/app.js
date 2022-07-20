// cd laragon/www/php/webmasteran/08_javascript/00-a

const products3 = [{
  title: 'book 1',
  price: 30
}, {
  title: 'book 2',
  price: 40
}, {
  title: 'book 3',
  price: 50
}]

getProducts = () => {
  setTimeout(() => {
    const fetchProducts = products3.map((item) => {
      return `Product title: ${item.title} - Product price: ${item.price}`
    })
    console.log(fetchProducts)
  }, 2000)
}

createProduct1 = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      products3.push({
        title: 'book 4',
        price: 90
      })
      const error = false
      if (!error) {
        resolve()
      } else {
        reject('Error')
      }
    }, 3000)
  })

}

async function getData1() {
  await  createProduct1()
  getProducts()
}

getData1()

