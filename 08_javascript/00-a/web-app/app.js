// cd laragon/www/php/webmasteran/08_javascript/00-a

let products = []

const filters = {
  searchItem: ''
}
const productsJson = localStorage.getItem('products')
if (productsJson !== null) {
  products = JSON.parse(productsJson)
}

const renderProducts = function (products, filters) {
  const filteredProducts = products.filter(function (item) {
    return item.title.toLowerCase().includes(filters.searchItem.toLowerCase())
  })
  document.querySelector('#products').innerHTML = ''
  filteredProducts.forEach(function (item) {
    const productEl = document.createElement('p')
    productEl.textContent = item.title
    document.querySelector('#products').appendChild(productEl)
  })
}

renderProducts(products, filters)

document.querySelector('#search-products').addEventListener('input', function (e) {
  filters.searchItem = e.target.value
  renderProducts(products, filters)
})

document.querySelector('#add-product-form').addEventListener('submit', function (e) {
  e.preventDefault()
  products.push({
    title: e.target.elements.productTitle.value,
    exists: true
  })
  localStorage.setItem('products', JSON.stringify(products))
  renderProducts(products, filters)
  e.target.elements.productTitle.value = ''
  console.log(products)
})

document.getElementById('checkExistProducts').addEventListener('change', function (e) {
  if (e.target.checked) {
    const filterExistProducts = products.filter(function (item) {
      return item.exists === true
    })
    renderProducts(filterExistProducts, filters)
  } else {
    renderProducts(products, filters)
  }
})

let msnDate = new Date()
console.log(msnDate)
