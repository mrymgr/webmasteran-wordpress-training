

let sendPost = () => {
  let postId = document.getElementById("post-id").value
  let postTitle = document.getElementById("post-title").value
  let postBody = document.getElementById("post-body").value

  fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`, {
    method: 'PUT',
    body: JSON.stringify({
      id: postId,
      title: postTitle,
      body: postBody
    }),
    headers: {
      'Content-Type' : 'application/json'
    }
  })
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

document.getElementById("send-post").addEventListener("click", sendPost)
