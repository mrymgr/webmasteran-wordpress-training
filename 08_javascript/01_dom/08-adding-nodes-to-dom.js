/********************************
 * Adding Nodes to the DOM
 * =========================
 * 1- using appendChild
 * 2- using insertBefore method
 * 3- using .insertBefore & .nextSibling (to insert after)
 *
 *
 *******************************/

let content = document.querySelector('.content'),
    pText = document.createTextNode('Mas Lorem '),
    pEl = document.createElement('p');
pEl.appendChild(pText);
content.appendChild(pEl);
console.log(content.outerHTML);

/********************************
 * Adding Nodes to the DOM with insertBefore
 * =========================================
 * parentEl.insertBefore(newEl, elAddBefore)
 *
 *******************************/

let firstP = content.children[1],
    pText1 = document.createTextNode('Newum'),
    pEl1 = document.createElement('p');
pEl1.appendChild(pText1);
content.insertBefore(pEl1, firstP);
console.log(content.outerHTML);


/********************************
 * How to Insert After an Element
 * ==============================
 * JavaScript does not have insertAfter
 * so we have to use a trick to do that
 *
 * parentEl.insertBefore(newEl, elAddBefore.nextSibling)
 *
 *******************************/
pEl.appendChild(pText);
content.insertBefore(pEl, firstP.nextSibling);

console.log(content.outerHTML);


/********************************
 * Replacing Nodes with replaceChild
 * ================================
 * parentEl.replaceChild(newEl, elToReplace)
 *
 *******************************/

pEl.appendChild(pText);
content.replaceChild(pEl, firstP);
console.log(content.outerHTML);

