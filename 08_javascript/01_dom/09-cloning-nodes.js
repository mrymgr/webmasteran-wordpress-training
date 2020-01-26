/********************************
 * Cloning Nodes
 * ==============
 * el.cloneNode() : only clone a node
 * el.cloneNode(true): clone node with all of nodes inside it
 *
 *  Note: the problem for second is e.g. id for all of cloned fields are the same
 *
 *
 *******************************/


let fieldsList = document.querySelector('.fields'),
    firstField = fieldsList.children[0],
    secondField = firstField.cloneNode(true),
    thirdField = firstField.cloneNode();
fieldsList.appendChild(secondField);
fieldsList.appendChild(thirdField);


/********************************
 * Cloning a Node and Updating
 * Values
 *
 *******************************/

let firstFieldInput = firstField.querySelector('input'),
    firstFieldIdStr = firstFieldInput.getAttribute('id'),
    secondFieldInput = secondField.querySelector('input'),
    secondFieldLabel = secondField.querySelector('label'),
    secondFieldIdStr = updateIdStr(firstFieldIdStr);
secondFieldInput.setAttribute('id', secondFieldIdStr);
secondFieldInput.setAttribute('name', secondFieldIdStr);
secondFieldLabel.setAttribute('for', secondFieldIdStr);
fieldsList.appendChild(secondField);

function updateIdStr(value) {
    let strArray = value.split('-'),
        id = strArray[strArray.length - 1],
        newId = parseInt(id) + 1;
    strArray[strArray.length - 1] = newId;
    return strArray.toString().replace(',', '-');
}

