const posts = [
  {
    title: "Post one",
    body: "This is post one",
  },
  {
    title: "Post one",
    body: "This is post one",
  },
]

function createPost(post) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      posts.push(post)
      let error = !true
      if (error) {
        reject("Sample Error...")
      } else {
        resolve()
      }
    }, 2000)
  })
}

function getPost() {
  setTimeout(() => {
    let output = ""
    posts.forEach(function (post) {
      output += `<li>${post.title}</li>`
    })
    document.body.innerHTML = output
  }, 1000)
}

createPost({ title: "Post three", body: "This is post three" })
  .then(getPost)
  .catch((err) => console.log(err))
