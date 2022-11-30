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

function createPost(post, callback) {
  setTimeout(() => {
    posts.push(post)
    callback()
  }, 2000)
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

createPost({ title: "Post three", body: "This is post three" }, getPost)
