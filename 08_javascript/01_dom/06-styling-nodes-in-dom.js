/********************************
 * Styling node in the DOM
 * use from window object
 *
 * Window object
 * ==============
 * sits one level above the document object.
 * Represents the window or tab displaying the document
 *
 * Get all of computed styles
 * ==========================
 * window.getComputedStyle : return all of styles for an Element
 *
 *
 * Set or Get specific property on an element
 * ===================================
 * window.getComputedStyle( el ).propToChange;
 *
 *******************************/
let content = document.querySelector('.content');

console.log(window.getComputedStyle(content));

/********************************
 * getComputedStyle properties
 *
 *******************************/

console.log(window.getComputedStyle(content).background);
console.log(window.getComputedStyle(content).backgroundColor);
console.log(window.getComputedStyle(content).borderColor);


/********************************
 * getComputedStyle properties
 * for pseudo element
 *
 *******************************/

let link = document.querySelector('a');
console.log(link);
// This doesn't work
console.log(window.getComputedStyle(link, 'hover').backgroundColor);
// This does work
console.log(window.getComputedStyle(link, 'after').content);

/********************************
 * Set inline styles
 * =================
 *
 * el.style.propToChange = 'new'
 *
 *******************************/

content.style.backgroundColor = 'rgba(0,0,0,.25)';
// content.style.backgroundColor = '#ccc';
content.style.border = '1px #000 solid';

/********************************
 * Convert hexadecimal to rgba
 * Source: http://goo.gl/ZtT8Tn
 *
 *******************************/

function hex2rgba(hex, opacity) {
    hex = hex.replace('#', '');
    r = parseInt(hex.substring(0, 2), 16);
    g = parseInt(hex.substring(2, 4), 16);
    b = parseInt(hex.substring(4, 6), 16);
    result = 'rgba(' + r + ',' +
        g + ',' + b +
        ',' + opacity / 100 + ')';
    return result;
}

content.style.backgroundColor = hex2rgba('#000000', 0);

/********************************
 * Get inline styles versus
 * computed styles
 *
 *******************************/

console.log('Computed: ' + window.getComputedStyle(content).backgroundColor);
console.log('Inline: ' + content.style.backgroundColor);
content.style.backgroundColor = '#222';
console.log('Computed: ' + window.getComputedStyle(content).backgroundColor);
console.log('Inline: ' + content.style.backgroundColor);

/********************************
 * Getting External Styles
 * =======================
 *
 * document.styleSheets
 *
 * to get css rules inside styleSheet
 * =================================
 * document.stylesheets[0].cssRules
 *
 * if your local server is not running, you get null value for cssRules
 * due to cross site origin security issue.
 * the error: Failed to read the 'cssRules' property from 'CSSStyleSheet': Cannot access rules
 *
 *******************************/

let stylesheets = document.styleSheets,
    mainStyles = stylesheets[0],
    mainStyleRules = stylesheets[0].cssRules;
console.log(stylesheets);
console.log(stylesheets[0]);
console.log(stylesheets[0].cssRules);

for (let style in  mainStyleRules) {
    console.log(mainStyleRules[style].cssText);
}

/********************************
 * Adding External Styles
 * ====================*
 * styleSheet.insertRule(selector, rule, index);
 * the reason of using index is related to cascading
 *
 * for old browsers:
 * styleSheet.addRule(selector, rule, index);
 *
 *******************************/

function addCSSRule(sheet, selector, rules, index) {
    if ('insertRule' in sheet) {
        sheet.insertRule(selector + "{" + rules + "}", index);
    }
    else if ('addRule' in sheet) {
        sheet.addRule(selector, rules, index);
    }
}

addCSSRule(mainStyles, 'a', 'font-size: 2rem', mainStyleRules.length);
for (let style in  mainStyleRules) {
    console.log(mainStyleRules[style].cssText);
}