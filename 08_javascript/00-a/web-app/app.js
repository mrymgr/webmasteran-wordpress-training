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

createProduct = (callback) => {
  setTimeout(() => {
    products3.push({
      title: 'book 4',
      price: 90
    })
    callback()
  }, 3000)
}

createProduct(getProducts)