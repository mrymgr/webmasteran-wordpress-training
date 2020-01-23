/*
* Dom Traversal:
* Moving from a node to its parent, children or sibling nodes.
*
* upward to parent nodes:
* ==================================
* .parentNode
* .parentElement
*
*
* */


let h1 = document.querySelector('h1'),
    h1ParentEl = h1.parentElement,
    h1ParentNode = h1.parentNode;

console.log(h1ParentEl);
console.log(h1ParentNode);
console.log(h1.parentNode.parentNode);


/********************************
 * Getting children/child of a node
 *
 * to get Any Node type:
 * ====================
 * .childNodes
 * .firstChild
 * .lastChild
 *
 * only select element nodes:
 * ==========================
 * .children
 * .firstElementChild
 * .lastElementChild
 * .childElementCount
 *
 * helpful properties to get extra information about node:
 * .length
 * .nodeType
 *
 *******************************/


let content = document.querySelector('.content'),
    contentChildrenEls = content.children,
    contentChildrenNodes = content.childNodes,
    contentFirstChildNode = content.firstChild,
    contentLastChildNode = content.lastChild,
    contentLastChildEl = content.lastElementChild,
    contentFirstChildEl = content.firstElementChild;

console.log( contentChildrenEls );
console.log( contentChildrenNodes );
console.log( contentFirstChildNode );
console.log( contentLastChildNode );
console.log( contentLastChildEl );
console.log( contentFirstChildEl );


console.log( contentChildrenEls.length );
console.log( contentChildrenNodes.length );
console.log( contentFirstChildNode.nodeType );
console.log( contentLastChildNode.nodeType );
console.log( contentLastChildEl.nodeType );
console.log( contentFirstChildEl.nodeType );
console.log( content.childElementCount );


/********************************
 * Getting siblings of a node
 *
 * Any Node Type:
 * .nextSibling
 * .previousSibling
 *
 * Element Nodes:
 * .nextElementSibling
 * .previousElementSibling
 *
 *******************************/


let contact = document.getElementById('contact'),
    contactPrevNode = contact.previousSibling,
    contactNextNode = contact.nextSibling,
    contactPrevEl = contact.previousElementSibling,
    contactNextEl = contact.nextElementSibling;


console.log(contactPrevNode, contactNextNode);
console.log(contactPrevEl, contactNextEl);






