let loadData = () => {
  const xhr = new XMLHttpRequest()
  const postNumber = document.getElementById('post-number').value 

  xhr.open('GET', `https://jsonplaceholder.typicode.com/posts/${postNumber}`);
  xhr.onload = () => {

    if(xhr.status === 200) {
      //console.log(JSON.parse(xhr.responseText))
      let post = JSON.parse(xhr.responseText)
      let output = ''
      output += '<ul>'
      output += `
          <li>ID: ${post.id}</li>
          <li>title: ${post.title}</li>
          <li>body: ${post.body}</li>
          <br><br>
        `
      output += '</ul>'
      document.getElementById('output').innerHTML = output
    }
  }
  xhr.send()

}

document.getElementById("button").addEventListener("click", loadData)
