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

async function getPost() {
  try {
    await createPost({ title: "Post three", body: "This is post three" })
    let output = ""
    posts.forEach(function (post) {
      output += `<li>${post.title}: ${post.body}</li>`
    })
    document.body.innerHTML = output
  } catch (err) {
    console.log(err)
  }
}

getPost()
