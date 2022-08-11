/********************************
 * Creating Dom Nodes
 *
 * Creating a Text Node
 * ===================
 * document.createTextNode( 'value' )
 *
 * Creating an Element Node
 * ========================
 * document.createElement('el')
 *
 *******************************/

let pText = document.createTextNode('Lorem');
console.log(pText.nodeType);
console.log(pText.nodeValue);

console.log(pText.nodeType);
console.log(pText.nodeValue);
let pEl = document.createElement('p');
console.log(pEl.nodeType);
console.log(pEl.innerHTML);


/********************************
 * Add text node on an element node
 * ===============================
 * Appending Nodes
 * el.appendChild( childNode )
 *
 *******************************/

pEl.appendChild(pText);
console.log(pEl.childNodes.length);
console.log(pEl.childNodes[0].nodeValue);
console.log(pEl.outerHTML);

/********************************
 * Creating a Link Node
 *
 *******************************/

let aText = document.createTextNode( 'Read More..' ),
    aEl = document.createElement('a'),
    pText1 = document.createTextNode( 'Learn more about the DOM. ' ),
    pEl1 = document.createElement('p');
aEl.setAttribute( 'href', '#link' );
aEl.appendChild( aText );
pEl1.appendChild( pText1 );
pEl1.appendChild( aEl );
console.log( pEl1.outerHTML );


/********************************
 * Using a Document Fragment
 *
 * Document fragment:
 * ==================
 * A container for holding nodes (temporary in RAM)
 * docFrag = document.createDocumentFragment();
 *
 *******************************/


let divEl = document.createElement('div'),
    docFrag = document.createDocumentFragment(),
    p1Text = document.createTextNode('Lorem'),
    p1El = document.createElement('p'),
    p2Text = document.createTextNode('Ipsum'),
    p2El = document.createElement('p'),
    p3Text = document.createTextNode('Maximus'),
    p3El = document.createElement('p');


p1El.appendChild(p1Text);
p2El.appendChild(p2Text);
p3El.appendChild(p3Text);

docFrag.appendChild(p1El);
docFrag.appendChild(p2El);
docFrag.appendChild(p3El);

divEl.appendChild(docFrag);
console.log(divEl.outerHTML);
