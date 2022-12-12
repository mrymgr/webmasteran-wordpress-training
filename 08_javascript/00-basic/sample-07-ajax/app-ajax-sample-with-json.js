let loadData = () => {
  const xhr = new XMLHttpRequest()
  xhr.open('GET', 'posts.json');
  xhr.onload = () => {

    if(xhr.status === 200) {
      //console.log(JSON.parse(xhr.responseText))
      let posts = JSON.parse(xhr.responseText)
      let output = ''
      output += '<ul>'
      posts.forEach( (post) => {
        output += `
          <li>ID: ${post.id}</li>
          <li>title: ${post.title}</li>
          <li>body: ${post.body}</li>
          <br><br>
        `
      });
      output += '</ul>'
      document.getElementById('output').innerHTML = output
    }
  }
  xhr.send()

}

document.getElementById("button").addEventListener("click", loadData)
