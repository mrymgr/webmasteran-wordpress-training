let loadData = () => {
  const xhr = new XMLHttpRequest()
  const postTitle = document.getElementById("post-title").value
  const postBody = document.getElementById("post-body").value

  const params = { userId: 2, title: postTitle, body: postBody }

  xhr.open("POST", "https://jsonplaceholder.typicode.com/posts")
  xhr.setRequestHeader("Content-Type", "application/json")
  xhr.onload = () => {
    console.log(xhr)
    //status code for success create from server
    if (xhr.status === 201) {
      //console.log(JSON.parse(xhr.responseText))
      let post = JSON.parse(xhr.responseText)
      let output = ""
      output += "<ul>"
      output += `
          <li>ID: ${post.id}</li>
          <li>title: ${post.title}</li>
          <li>body: ${post.body}</li>
          <br><br>
        `
      output += "</ul>"
      document.getElementById("output").innerHTML = output
    }
  }
  xhr.send(JSON.stringify(params))
}

document.getElementById("button").addEventListener("click", loadData)
