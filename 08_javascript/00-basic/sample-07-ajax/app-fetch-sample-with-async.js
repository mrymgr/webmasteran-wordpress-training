let getPost = async () => {
  let postNumber = Number(document.getElementById("post-number").value)
  if (!(postNumber > 0 && postNumber < 101)) {
    postNumber = 1
  }
  postNumber = !(postNumber > 0 || postNumber < 101) ? 1 : postNumber
  postNumber = postNumber == 0 ? 1 : postNumber

  try {
    let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${postNumber}`)
    if (res.ok) {
      let post = await res.json()
      //console.log(post)
      let output = ""
      output += `<ul>
                  <li>id: ${post.id} </li>
                  <li>title: ${post.title} </li>
                  <li>body: ${post.body} </li>
                </ul>`
      document.getElementById("output").innerHTML = output
    } else {
      throw Error(`You have error! status code from server: ${res.status}`)
    }
  } catch (error) {
    console.log(err)
    document.getElementById("output").innerHTML = err
  }
}

let getPosts = async () => {
  fetch("https://jsonplaceholder.typicode.com/posts")
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
      output += "<ul>"
      data.forEach((post) => {
        output += `<li>id: ${post.id} </li>
                  <li>title: ${post.title} </li>
                  <li>body: ${post.body} </li>
                  <br><br>`
      })

      output += "</ul>"
      document.getElementById("output").innerHTML = output
    })
    .catch((err) => {
      console.log(err)
      document.getElementById("output").innerHTML = err
    })
}

document.getElementById("get-post").addEventListener("click", getPost)
document.getElementById("get-posts").addEventListener("click", getPosts)
