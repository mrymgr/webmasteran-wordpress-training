
let productListSection = document.getElementById('productList')
let productSearchListSection = document.getElementById('productSearchList')
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
  productSearchListSection.innerHTML = ''
  const productList = listSearchedItems()
  const searchResult = productList.filter((item) => {
    return item.toLowerCase().includes(searchItem.toLowerCase())
  })
  searchResult.forEach(function (item, index) {
    let newProduct = document.createElement('p')
    newProduct.textContent = item
    productSearchListSection.appendChild(newProduct)
  })
}
document.getElementById('productSearch').addEventListener('input',function (e) {

  searchItem = e.target.value
  searchProducts(searchItem)
})