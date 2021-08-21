
/*
* running app.js from console
* ===========================
* use from this command:
* node app.js
*
* */

/*
* define variable
* ================
* */
let variableName = 'value'
var variableName2 = 20

/*
* define function
* ===============
* */

let functionName = function (arg1 = value, arg2 = null) {
  //code block
}

/*
* Template string
* ===============
* */

let getUserInfo = function ( name , id) {
  return `Name: ${name} - ID: ${id}`
}

let showResult = getUserInfo('gholam', 'ghanbari')
console.log(showResult);