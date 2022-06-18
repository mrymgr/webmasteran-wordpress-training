// cd laragon/www/php/webmasteran/08_javascript/00-a


let productListSection = document.getElementById('productList')
let listSearchedItems = function () {
  let searchedItems = []
  let list = productListSection.children
  for (let item of list) {
    searchedItems.push(item.textContent)
  }
  return searchedItems

}

document.getElementById('addProduct').addEventListener('click',function (e) {
  e.preventDefault()
  let newProductTitle = document.getElementById('productTitle').value
  let newProduct = document.createElement('p')
  newProduct.textContent = newProductTitle
  productListSection.appendChild(newProduct)
  document.getElementById('productTitle').value = ''
})


let searchProducts = function (searchItem) {
  const searchResult = productSearchedItems.filter((item) => {
    return item.toLowerCase().includes(searchItem.toLowerCase())
  })
  console.log(productSearchedItems)
  console.log(searchResult)
}
document.getElementById('productSearch').addEventListener('input',function (e) {

  searchItem = e.target.value
  searchProducts(searchItem)
})