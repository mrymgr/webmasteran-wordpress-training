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

const findProducts = function (cartItems, productTitle) {

  const indexValue = cartItems.findIndex(function (item, index) {
    return item.title.toLowerCase() === productTitle.toLowerCase()
  })
  return cartItems[indexValue]
}

const result1 = findProducts(cartItems1, 'BOok 4')
console.log(result1)