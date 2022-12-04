let loadData = () => {
  const xhr = new XMLHttpRequest()
  xhr.open('GET', 'data.txt');
  xhr.onload = () => {
    //to see exact returning value from xhr object, you can use from console.log like in the following line
    //console.log(xhr)
    if(xhr.status == 200) {
      document.getElementById('output').innerHTML = xhr.responseText
    }
  }
  xhr.send()

}

document.getElementById("button").addEventListener("click", loadData)
