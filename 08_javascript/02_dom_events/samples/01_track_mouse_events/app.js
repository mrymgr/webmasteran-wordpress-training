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
        } else if ('mouse-over') {
            mouseOverObject.run();
        } else if ('key-press') {
            keyPressObject.run();
        } else if ('scroll') {
            scrollObject.run();
        }
    }

    removeExtraEvents() {
        document.removeEventListener('mousemove', mouseMovementObject.logMousePosition);
        mouseOverObject.child.removeEventListener('mouseover', mouseOverObject.mouseOver);
        mouseOverObject.child.removeEventListener('mouseenter', mouseOverObject.mouseEnter);
        mouseOverObject.child.removeEventListener('mouseleave', mouseOverObject.mouseLeave);

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

    constructor() {
        this.child = document.querySelector('.child');
    }

    run() {

        console.log('We are in: ' + this.constructor.name);
        /********************************
         * When Mouse Moves Over or
         * Enters an Element
         * 1.4.1.2
         *
         *******************************/

        this.child.addEventListener('mouseover', this.mouseOver);
        this.child.addEventListener('mouseenter', this.mouseEnter);
        this.child.addEventListener('mouseleave', this.mouseLeave);

    }

    mouseOver() {
        console.log('Mouse over');
    }

    mouseLeave = function() {
        console.log('Mouse left');
    }

    mouseEnter() {
        console.log('Mouse enter');
        //this.child.style.cursor = 'wait';
    }
}

class Key_Press {
    run() {
        console.log('We are in: ' + this.constructor.name);

    }
}

class Scroll {
    run() {
        console.log('We are in: ' + this.constructor.name);

    }
}

let mouseMovementObject = new Mouse_Movement(),
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

