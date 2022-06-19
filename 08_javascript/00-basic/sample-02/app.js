const products = []

const filters = {
  searchItem: ''
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
  renderProducts(products, filters)
  e.target.elements.productTitle.value = ''
})