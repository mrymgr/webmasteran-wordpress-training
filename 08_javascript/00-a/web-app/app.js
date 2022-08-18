// cd laragon/www/php/webmasteran/08_javascript/00-a

const getBtn = document.getElementById("get-btn")
const postBtn = document.getElementById("post-btn")

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

const postData = () => {
  //
}

getBtn.addEventListener("click", getData1)
postBtn.addEventListener("click", postData)
