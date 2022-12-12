let getData = () => {
  fetch("data.txt1")
    .then((res) => {
      console.log(res)
      if (res.ok) {
        return res.text()
      } else {
        throw Error(`You have error! status code from server: ${res.status}`)
      }
    }) //text method return a promise, so we can use then after this line
    .then((data) => {
      document.getElementById("output").innerHTML = data
    })
    .catch((err) => {
      console.log(err)
      document.getElementById("output").innerHTML = err
    })
}

document.getElementById("get-text").addEventListener("click", getData)
