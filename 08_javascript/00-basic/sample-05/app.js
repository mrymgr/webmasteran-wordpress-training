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

let options = {
  title: "My menu",
  items: ["Item1", "Item2"]
};

function showMenu({
  title = "Untitled",
  width: w = 100,  // width goes to w
  height: h = 200, // height goes to h
  items: [item1, item2] // items first element goes to item1, second to item2
}) {
  alert( `${title} ${w} ${h}` ); // My Menu 100 200
  alert( item1 ); // Item1
  alert( item2 ); // Item2
}

showMenu(options);