/********************************
 * Getting Attribute Nodes
 *
 * When you working a node, you can access to attributes property on it.
 * the type of returning of this property is: NamedNodeMap
 * NamedNodeMap is an unordered collection of element and attributes, accessible similar to an array
 *
 * To get attribute data:
 * .nodeName
 * .nodeValue
 *
 *
 *******************************/

let a = document.querySelector('a'),
    atts = a.attributes;
console.log(atts);
for (let i = 0, max = atts.length; i < max; i++) {
    console.log(atts[i].nodeName +
        ': ' +
        atts[i].nodeValue);
}


/********************************
 * methods to get and set a specific Attribute
 * ===========================================
 * .getAttribute()
 * .setAttribute()
 *
 *******************************/
a = document.querySelector('a'),
    aTitle = a.getAttribute('title'),
    aHref = a.getAttribute('href');
console.log(aTitle);
console.log(aHref);

a = document.querySelector('a');
a.setAttribute('href', 'https://wpwebmaster.ir');
a.setAttribute('id', 'wpwebmaster');
console.log(a.getAttribute('href'));
console.log(a.getAttribute('id'));

/********************************
 * Working with Classes
 *
 * Getting class attributes:
 * .getAttribute('class') : return is a string of classes
 * .className : return is a string of classes
 * .classList : return is a collection (0,1,2,... is list of classes + length + value
 *
 *******************************/

let content = document.querySelector('.content');


console.log(content.getAttribute('class'));
console.log(content.className);
console.log(content.classList);

/*
*
* Available methods on return of classList collection
* */
content.classList.add('active');
content.classList.remove('active');
content.classList.toggle('active');

console.log(content.classList.length);
console.log(content.classList.value);
console.log(content.classList);


/********************************
 * Data Attributes
 *
 * Getting Data Attributes:
 * ========================
 * .getAttribute('data-attr'): the return is a string
 * .dataset: the return is DomStringMap
 * it is like an object and you can access to each data like property of object
 *
 * DomStringMap:
 * =============
 * An object containing the names and values of attributes for a Node Element.
 *
 *******************************/

let contact = document.getElementById('contact');


console.log(contact.getAttribute('data-time'));

console.log(contact.dataset);

console.log(contact.dataset.location);

contact.dataset.location = 'Asheville';
console.log(contact.dataset.location);

