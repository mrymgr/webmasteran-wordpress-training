/*
* Types of Nodes:
* Document [9]
* DocumentType [10]
* Element [1]
* Text [3]
* Comments [8]
* DocumentFragments [11]
* */

/*
*
* Select Dom Nodes with JS:
* document : to get all of document nodes
*
* helpful document properties:
* ============================
* url
* location: object with pathname property that shows the path of running file
* doctype
* charset
* title
* styleSheets
* scripts
* head
* body
* links : array of links in a document - the return is HTMLCollection
* images
* forms
* children
* childNodes
*
* Helpful document Methods
* ========================
* document.getElementById()
* document.getElementsByTagName()
* document.getElementsByClassName()
*
* Note: notice to name of element & elements for these methods
*
* document.querySelector()
* document.querySelectorAll()
*
* Note: you can write a selector like css for these
* querySelector returns the first element which is matched
* querySelectorAll returns all elements which are matched
*
* */
let html = document.children[0]; //getting first element in document which is html tag
let contact = document.getElementById('contact'); //return element by contact id
let divs = document.getElementsByTagName('div'); //return an array
let contentClass = document.querySelector('.content');
let contentClasses = document.querySelectorAll('.content');
//use all of these methods with other nodes not just document
contact = document.getElementById('contact');
console.log(contact.querySelector('a'));

/*
* Note: loop on HTMLCollection
* to loop on DOM list such HTMLCollection or nodeList, only use for/of iteration
* */

let list = document.getElementsByClassName("events")
for (let item of list) {
  console.log(item.id)
}

//another sample (get all of links in a document):
let documentLinkList = document.links
for (let item of documentLinkList) {
  console.log(item.href)
}


