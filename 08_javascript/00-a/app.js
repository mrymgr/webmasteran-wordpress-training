let email = '  gholam@gmail.com      '
console.log(`String length is:${email.length} and original string is: '${email.replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trim().length} and trim string is: '${email.trim().replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trimRight().length} and trim right string is: '${email.trimRight().replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trimLeft().length} and trim left string is: '${email.trimLeft().replace(/\s/g,'*')}'`);
console.log(`String length is:${email.trimStart().length} and trim start string is: '${email.trimStart().replace(/\s/g,'*')}'`);
