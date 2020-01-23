/********************************
 * Getting DOM Node Values
 * =======================
 * Element Nodes
 * Text Nodes
 *
 * To get element Node values:
 * ===========================
 * .innerHTML
 * .innerText : do not show hidden or invisible text in dom (using css)
 * .textContent
 * .outerHTML
 * .outerText
 *
 *******************************/

let content = document.querySelector('.content');

console.log(content.innerHTML);
console.log(content.innerText);
console.log(content.textContent);

/********************************
 * Setting innerHTML and textContent
 *
 * first method is not a best practice
 * second method is best practice to set value for an element
 *
 *******************************/

//first method
content = document.querySelector('.content'),
    newContent;

content.innerHTML = '<h2>Sub Title</h2>';
content.innerHTML += '<p>Lorem</p>';

//Second method: define a variable and then assign desire content and then set it with innerHTML

newContent = '<h2>Sub Title</h2>';
newContent += '<p>Lorem</p>';
content.innerHTML = newContent;

//To add text to your element
content.textContent = '<p>Lorem</p>';
content.textContent += 'Text';

content.innerText = '<p>Lorem</p>';
content.innerText += 'Text';

/********************************
 * Get out of an element
 * outerHTML and outerText
 *
 *******************************/

content = document.querySelector('.content');
console.log(content.outerHTML);
console.log(content.outerText);


/********************************
 * Setting outerHTML and outerText
 * The first: you get error
 * The second: is a right way to do that
 *
 *******************************/

//first
content = document.querySelector('.content'),
    newOuterHTML;

content.outerHTML = '<div class="content active">';
//after this line, browser add automatically div closing tag and you will get error for other lines
content.outerHTML += '<h1>New Title</h1>';
content.outerHTML += '<p>Nuevo Lorem</p>';
content.outerHTML += '</div>';
//second
newOuterHTML = '<article class="content active">';
newOuterHTML += '<h1>New Title</h1>';
newOuterHTML += '<p>Nuevo Lorem</p>';
newOuterHTML += '</article>';
content.outerHTML = newOuterHTML;

//it's not common to use it due to removing whole of element and replacing it with only a text
content.outerText = 'All of the new text';
console.log(content);

/********************************
 * To get Text Node values:
 * =======================
 * .data
 * .nodeValue
 *
 *******************************/

let a = document.querySelector('a'),
    aText = a.firstChild,
    aAtts = a.attributes; //The type of this is NodeMap
//They are the same when use it for text value inside an element
console.log(aText.data);
console.log(aText.nodeValue);
//They are different when use it on text values inside of attributes
console.log(aAtts);
console.log(aAtts[0].data);
console.log(aAtts[0].nodeValue);


/********************************
 * To set Text Node values:
 * =======================
 *
 *******************************/
a = document.querySelector('a'),
    aText = a.firstChild;

aText.data = 'Follow me on Twitter';
aText.nodeValue = '@hijacked';
//it is confirmed that node type is a Text node
if (3 === aText.nodeType) {
    aText.nodeValue = '@confirmed';
}

