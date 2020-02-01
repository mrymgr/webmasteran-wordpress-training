/********************************
 * Track mouse movement
 *
 *******************************/
class Get_Element_Target {

    constructor() {
        this.idsArray = [
            'mouse-movement',
            'mouse-over',
            'key-press',
            'scroll'
        ];
    }

    handleEvent(event) {
        this.id = event.target.getAttribute('id');
        if (this.idsArray.includes(this.id)) {
            this.setListener();
        }
    }

    setListener() {
        this.removeExtraEvents();
        if ('mouse-movement' === this.id) {
            mouseMovementObject.run();
        } else if ('mouse-over' === this.id) {
            mouseOverObject.run();
        } else if ('key-press' === this.id) {
            keyPressObject.run();
        } else if ('scroll' === this.id) {
            scrollObject.run();
        }
    }

    removeExtraEvents() {
        console.clear();
        document.removeEventListener('mousemove', mouseMovementObject.logMousePosition);
        childElm.removeEventListener('mouseover', mouseOverObject.mouseOver);
        childElm.removeEventListener('mouseenter', mouseOverObject.mouseEnter);
        childElm.removeEventListener('mouseleave', mouseOverObject.mouseLeave);
        document.removeEventListener('keydown', function () {
            keyPressObject.logKeys()
        });

    }


}


class Mouse_Movement {
    run() {
        console.log('We are in: ' + this.constructor.name);
        /********************************
         * Track Mouse Movement
         *
         *******************************/

        document.addEventListener('mousemove', this.logMousePosition);
    }

    logMousePosition() {
        console.log(event.clientX + ' x ' + event.clientY);
    }
}

class Mouse_Over {

    /*constructor() {
        this.child = document.querySelector('.child');
    }*/

    run() {

        console.log('We are in: ' + this.constructor.name);
        /********************************
         * When Mouse Moves Over or
         * Enters an Element
         * 1.4.1.2
         *
         *******************************/

        childElm.addEventListener('mouseover', this.mouseOver);
        childElm.addEventListener('mouseenter', this.mouseEnter);
        childElm.addEventListener('mouseleave', this.mouseLeave);

    }

    mouseOver() {
        console.log('Mouse over');
    }

    mouseLeave = function () {
        console.log('Mouse left');
        childElm.style.cursor = 'pointer';

    };

    mouseEnter() {
        console.log('Mouse enter');
        childElm.style.cursor = 'wait';
    }
}

class Key_Press {

    run() {
        console.log('We are in: ' + this.constructor.name);
        this.showShortcuts();
        document.addEventListener('keydown', function () {
            keyPressObject.logKeys(event)
        });

    }


    logKeys(event) {
        /*console.log('keycode:' + event.keyCode);
        console.log('which:' + event.which);
        console.log('key:' + event.key);
        console.log('alt:' + event.altKey);
        console.log('ctrl:' + event.ctrlKey);
        console.log('meta:' + event.metaKey);
        console.log('buble:' + event.bubbles);*/
        this.key = event.keyCode;
        this.updateText(event);
    };

    updateText = function (event) {
        console.log(this.key);
        this.textContainer = document.getElementById('loggedKeys'),
            this.text = this.textContainer.textContent;
        /*console.log(this.textContainer);
        console.log(this.text);*/

        if (46 === this.key) {

            console.log('Cleared!');
            this.text = '';

        } else if (19 === this.key) {

            console.log('Saved!');

        } else if (32 === this.key) {

            this.text += ' ';

        } else {

            this.text += String.fromCharCode(this.key);

        }

        this.textContainer.innerHTML = this.text;
    };

    showShortcuts = function () {
        this.helpTextEl = document.createElement('p'),
            this.helpText = document.createTextNode('Shortcuts: Save [pause button ] -- Clear [Delete]');

        this.helpTextEl.appendChild(this.helpText);
        parentEl.appendChild(this.helpTextEl);
    }


}

class Scroll {
    run() {
        console.log('We are in: ' + this.constructor.name);

    }
}


let childElm = document.querySelector('.child'),
    parentEl = document.querySelector('.parent'),
    mouseMovementObject = new Mouse_Movement(),
    mouseOverObject = new Mouse_Over(),
    keyPressObject = new Key_Press(),
    scrollObject = new Scroll(),
    getElementTargetObject = new Get_Element_Target();


document.addEventListener('click', getElementTargetObject);


/********************************
 * Log Keys Pressed and
 * Creating Shortcuts
 * 1.4.1.3
 *
 *******************************/

// var logKeys,
//     updateText,
//     showShortcuts;
//
// logKeys = function(){
//   var keynum;
//
//   if( window.event ) {
//     // For IE
//     key = event.keyCode;
//   } else if( event.which ) {
//     // Other browsers
//     key = event.which;
//   }
//
//   updateText( key, event );
//
//
// }
//
// updateText = function( key ) {
//
//   var textContainer = document.getElementById( 'loggedKeys' ),
//       text = textContainer.textContent;
//
//   console.log( key );
//
//   if ( 3 === key ) {
//
//     console.log( 'Cleared!' );
//     text = '';
//
//   } else if ( 19 === key ) {
//
//     console.log( 'Saved!' );
//
//   } else if ( 32 === key) {
//
//     text += ' ';
//
//   } else {
//
//     text += String.fromCharCode( key );
//
//   }
//
//   textContainer.innerHTML = text;
//
// }
//
//
// showShortcuts = function() {
//
//   var parentEl = document.querySelector( '.parent' ),
//       helpTextEl = document.createElement( 'p' ),
//       helpText = document.createTextNode( 'Shortcuts: Save [crt + s] -- Clear [crt + c]' );
//
//   helpTextEl.appendChild( helpText );
//   parentEl.appendChild( helpTextEl );
//
//
// }
//
// showShortcuts();
// document.addEventListener( 'keypress', logKeys );


/********************************
 * Scroll to an Element
 * 1.4.1.4
 *
 *******************************/

// var parentEl = document.querySelector( '.parent' ),
//     footer = document.getElementsByTagName( 'footer' )[0],
//     pEl = document.createElement( 'p' ),
//     linkEl = document.createElement( 'a' ),
//     aText = document.createTextNode( 'Scroll to Footer' ),
//     footerY;
//
// footer.style.marginTop = '4000px';
// footerY = footer.getBoundingClientRect().top,
// linkEl.setAttribute( 'href', '#' );
// linkEl.classList.add( 'button' );
// linkEl.appendChild( aText );
// pEl.appendChild( linkEl );
// parentEl.appendChild( pEl );
//
// scrollToFooter = function( event ) {
//
//   // For Chrome
//   window.scrollBy( 0, footerY );
//   event.preventDefault();
//
//   // // For Firefox
//   // window.scrollBy({
//   //   'left': 0,
//   //   'top': footerY,
//   //   'behavior': 'smooth',
//   // });
//   // event.preventDefault();
//
// };
//
// linkEl.addEventListener( 'click', scrollToFooter );

