let deletePost = () => {
  let postId = document.getElementById("post-id").value

  fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`, {
    method: "DELETE",
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
      /**
       * Detect if response is empty object
       * =================================
       * If the result of delete request will be successful, you'll get {} as a response
       * check these links bellow:
       * https://stackoverflow.com/questions/679915/how-do-i-test-for-an-empty-javascript-object
       * https://builtin.com/software-engineering-perspectives/javascript-check-if-object-is-empty
       *
       */

      console.log(data)
      if (Object.keys(data).length === 0) {
        console.log("Deleted")
        document.getElementById("output").innerHTML = "Deleted"
      } else {
        throw Error("You have an error to delete this post!")
      }
      //console.log(data)
    })
    .catch((err) => {
      console.log(err)
      document.getElementById("output").innerHTML = err
    })
}

document.getElementById("send-post").addEventListener("click", deletePost)
