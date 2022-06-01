
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

/*
* Define object
* ==============
* */

let userInfo = {
  userId: 22,
  userName: 'gholam',
  role: 'Admin'
}

//access to properties in object
console.log(`User role is: ${userInfo.role}`)

//Working with methods
let course = {
  name: 'gholam shenasi',
  studentLimit: 30,
  studentCount: 15,
  checkAvailability: function (courseSize) {
    let leftCount = this.studentLimit - this.studentCount
    return courseSize <= leftCount
  }
}

console.log(course.checkAvailability(20));

/*
* String methods
* ==============
* */

let fullName = 'Gholam Ghanbari'
//get string length
console.log(fullName.length)

//find a substring inside a string
let password = 'gholam123'
console.log(password.includes('gholam'));

//remove space from left & right + replace in a string
let email = '  gholam@gmail.com      '
console.log(`String length is:${email.length} and original string is: '${email.replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trim().length} and trim string is: '${email.trim().replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trimRight().length} and trim right string is: '${email.trimRight().replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trimLeft().length} and trim left string is: '${email.trimLeft().replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trimStart().length} and trim start string is: '${email.trimStart().replace(/\s/g,'*')}'`);


