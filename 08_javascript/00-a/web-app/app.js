// cd laragon/www/php/webmasteran/08_javascript/00-a

const getBtn = document.getElementById("get-btn")
const postBtn = document.getElementById("post-btn")

const getData3 = () => {
  axios.get("https://jsonplaceholder.typicode.com/posts/1").then((res) => {
    console.log(res)
  })
}

const postData3 = () => {
  axios
    .post("https://jsonplaceholder.typicode.com/posts", {
      userId: 5,
      id: 5,
      title: "Post title 5",
      body: "Post body 5",
    })
    .then((res) => {
      console.log(res)
    })
}

getBtn.addEventListener("click", getData3)
postBtn.addEventListener("click", postData3)

let products2 = ['Book 1', 'Book 2', 'Book 3']
products2 = [...products2, 'Book 4']
console.log(products2)