let getPost = () => {
  fetch("post.json")
    .then((res) => {
      //console.log(res)
      if (res.ok) {
        //console.log(res.json())
        return res.json()
      } else {
        throw Error(`You have error! status code from server: ${res.status}`)
      }
    })
    .then((data) => {
      //console.log(data)
      let output = ""
      output += `<ul>
                  <li>id: ${data.id} </li>
                  <li>title: ${data.title} </li>
                  <li>body: ${data.body} </li>
                </ul>`
      document.getElementById("output").innerHTML = output
    })
    .catch((err) => {
      console.log(err)
      document.getElementById("output").innerHTML = err
    })
}

let getPosts = () => {}

document.getElementById("get-post").addEventListener("click", getPost)
document.getElementById("get-post").addEventListener("click", getPosts)
