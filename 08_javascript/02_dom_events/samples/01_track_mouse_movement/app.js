/********************************
 * Track mouse movement
 *
 *******************************/
class Show_Handle {
    constructor() {
        this.dataset = ['contact', 'first-content', 'drag-and-drop-demo', 'lightbox-demo', 'video'];
    }

    handleEvent(event) {
        this.target = event.target;
        let target_dataset = this.target.dataset.type;
        if (!this.checkDataSet(target_dataset)) {
            return;
        }
        this.showElement(target_dataset);
    }

    checkDataSet(dataset) {
        return this.dataset.includes(dataset);
    }

    showElement(id) {
        for (let element of this.dataset) {
            if (element === id) {
                document.getElementById(id).style.display = 'block';
            } else {
                document.getElementById(element).style.display = 'none';
            }
        }

    }

}

class Check_Visible {
    constructor() {
        this.idArray = ['contact', 'first-content', 'drag-and-drop-demo', 'lightbox-demo', 'video'];
        this.propertyNamesArray = ['contact', 'firstContent', 'dragDrop', 'lightboxDemo', 'video'];
    }

    handleEvent(event) {
        this.getAllDisplayStyles();
        for (let id of this.idArray) {
            let style = id + 'DisplayStyle';
        }

    }

    getAllDisplayStyles() {
        let counter = 0;
        for (let id of this.idArray) {
            let style = this.propertyNamesArray[counter] + 'DisplayStyle';
            let el = document.getElementById(id);
            this[style] = window.getComputedStyle(el).display;
            /*console.log(style);
            console.log(this[style]);*/
            counter++;
        }

    }


}

class Execute_Sections {

    myChecking(checkVisibilityObject) {
        if ('block' === checkVisibilityObject.firstContentDisplayStyle) {
            contentSampleObject.run();
        } else if ('block' === checkVisibilityObject.contactDisplayStyle) {
            contactSampleObject.run();
        } else if ('block' === checkVisibilityObject.dragDropDisplayStyle) {
            dragSampleObject.run();
        } else if ('block' === checkVisibilityObject.lightboxDemoDisplayStyle) {
            lightboxSampleObject.run();
        } else if ('block' === checkVisibilityObject.videoDisplayStyle) {
            videoSampleObject.run();
        }

        /*

        lightboxDemoDisplayStyle: "none"
        videoDisplayStyle: "none
        * */
    }


}

class Content_Sample {

    run() {
        console.log('We are in: ' + this.constructor.name);
        /********************************
         * Track Mouse Movement
         *
         *******************************/

        var logMousePosition = function () {
            console.log(event.clientX + ' x ' + event.clientY);
        };
        document.addEventListener('mousemove', logMousePosition, false);
    }
}

class Contact_Sample {

    run() {
        console.log('We are in: ' + this.constructor.name);
    }
}

class Drag_Sample {

    run() {
        console.log('We are in: ' + this.constructor.name);
    }
}

class Lightbox_Sample {

    run() {
        console.log('We are in: ' + this.constructor.name);
    }
}

class Video_Sample {

    run() {
        console.log('We are in: ' + this.constructor.name);
    }
}

let showElementObject = new Show_Handle();
let checkVisibilityObject = new Check_Visible();
let msnSample = new Execute_Sections();
let contentSampleObject = new Content_Sample();
let contactSampleObject = new Contact_Sample();
let dragSampleObject = new Drag_Sample();
let lightboxSampleObject = new Lightbox_Sample();
let videoSampleObject = new Video_Sample();


document.addEventListener('click', showElementObject);
document.addEventListener('click', checkVisibilityObject);
document.addEventListener('click', function () {
    msnSample.myChecking(checkVisibilityObject);
});
//document.addEventListener('click', runParts);


let form = document.getElementById('contact');


/********************************
 * Track Mouse Movement
 * 1.4.1.1
 *
 *******************************/

// var logMousePosition = function() {
//   console.log( event.clientX + ' x ' + event.clientY );
// }
//
// document.addEventListener( 'mousemove', logMousePosition, false );


/********************************
 * When Mouse Moves Over or
 * Enters an Element
 * 1.4.1.2
 *
 *******************************/

// var child = document.querySelector( '.child' ),
//     mouseOver,
//     mouseEnter,
//     mouseLeave;
//
// mouseOver = function mouseOver() {
//   console.log( 'Mouse over' );
// }
// mouseEnter = function mouseEnter() {
//   console.log( 'Mouse enter' );
//   child.style.cursor = 'wait';
// }
// mouseLeave = function mouseLeave() {
//   console.log( 'Mouse left' );
//   child.style.cursor = 'pointer';
// }
//
// child.addEventListener( 'mouseover', mouseOver );
// child.addEventListener( 'mouseenter', mouseEnter );
// child.addEventListener( 'mouseleave', mouseLeave );


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


/********************************
 * Form Events
 * 1.4.1.5
 *
 *******************************/


// (function (window, document, undefined) {
//
//   var contactForm = document.getElementById( 'contact' ),
//       parentEl = document.querySelector( '.parent' ),
//       parentHeading = parentEl.querySelector( 'h2' ),
//       childEl = document.querySelector( '.child' );
//
//   childEl.remove();
//   parentHeading.innerText = 'Contact Us';
//   contactForm.style.display = 'block';
//
//   function processForm( event ) {
//
//     //Get all the form data
//     var name = document.getElementsByName( 'name' )[0].value,
//         email = document.getElementsByName( 'email' )[0].value,
//         message = document.getElementsByName( 'message' )[0].value,
//         pEl = document.createElement( 'p' ),
//         thankYouTextNode = document.createTextNode( 'a' ),
//         thankYouMessage = '';
//
//
//     thankYouMessage += 'Hey ';
//     thankYouMessage += name;
//     thankYouMessage += '! Thanks for your message :) ';
//     thankYouMessage += ' We will email you back at ';
//     thankYouMessage += email;
//     thankYouMessage += '.';
//
//     console.log( thankYouMessage );
//
//     thankYouTextNode.nodeValue = thankYouMessage;
//     console.log( thankYouTextNode );
//     pEl.appendChild( thankYouTextNode );
//     contactForm.remove();
//     parentEl.appendChild( pEl );
//
//
//     event.preventDefault();
//
//   };
//
//   contactForm.addEventListener( 'submit', processForm );
//
// })(window, document);


/********************************
 * Media Events
 * 1.4.1.6
 *
 *******************************/

// var videoContainer = document.getElementById( 'video' ),
//     videoEl = document.querySelector( 'video' ),
//     parentEl = document.querySelector( '.parent' ),
//     playBtn = document.getElementById( 'play' ),
//     pauseBtn = document.getElementById( 'pause' ),
//     restartBtn = document.getElementById( 'restart' ),
//     timestamp = document.getElementById( 'timestamp' );
//
// // Remove parent element and show video container
// parentEl.remove();
// videoContainer.style.display = 'block';
//
// function playVideo() {
//   videoEl.play();
// }
//
// function pauseVideo() {
//   videoEl.pause();
// }
//
// function restartVideo() {
//   videoEl.currentTime = 0;
// }
//
// function updateTimestamp() {
//   timestamp.innerHTML = parseInt( videoEl.currentTime );
// }
//
// playBtn.addEventListener( 'click', playVideo );
// pauseBtn.addEventListener( 'click', pauseVideo );
// restartBtn.addEventListener( 'click', restartVideo );
// videoEl.addEventListener( 'timeupdate', updateTimestamp );


/********************************
 * Drag and Drop
 * 1.4.1.7
 *
 *******************************/

// (function (window, document, undefined) {
//
// var childEl = document.querySelector( '.child' ),
//     dragDemo = document.getElementById( 'drag-and-drop-demo' ),
//     movable = document.querySelector( '.move' ),
//     copyable = document.querySelector( '.copy' ),
//     droppable = document.querySelector( '.droppable' ),
//     moving,
//     copying,
//     classes,
//     moveableDragStartHandler,
//     moveableDragEndHandler,
//     droppableEnterHandler,
//     droppableLeaveHandler,
//     dropHandler;
//
//
// childEl.remove();
// dragDemo.style.display = 'block';
//
// moveableDragStartHandler = function moveableDragStartHandler( event ) {
//
//
//   if ( event.target.classList.contains( 'copy' ) ) {
//     copying = event.target;
//   }
//   if ( event.target.classList.contains( 'move' ) ) {
//     moving = event.target;
//     moving.classList.add( 'active' );
//   }
//
//   event.dataTransfer.setData( 'text/plain', event.target.classList );
//
// };
//
// moveableDragEndHandler = function moveableDragEndHandler( event ) {
//
//   event.target.classList.remove( 'active' );
//   droppable.classList.remove( 'active' );
//
// };
//
// droppableEnterHandler = function droppableEnterHandler( event ) {
//
//   event.preventDefault();
//   droppable.classList.add( 'active' );
//
// };
//
// droppableLeaveHandler = function droppableLeaveHandler( event ) {
//
//   droppable.classList.remove( 'active' );
//
// };
//
// dropHandler = function dropHandler( event ) {
//
//
//   event.preventDefault();
//   classes = event.dataTransfer.getData( 'text' );
//
//
//   if ( classes.indexOf( 'copy' ) > -1 ) {
//
//     newCopy = copying.cloneNode( true );
//     droppable.appendChild( newCopy );
//     copying = null;
//
//   }
//
//   if ( classes.indexOf( 'move' ) > -1 ) {
//
//     droppable.appendChild( moving );
//     moving.classList.remove( 'active' );
//     moving = null;
//
//   }
//
//   droppable.classList.remove( 'active' );
//
//
// };
//
// movable.addEventListener( 'dragstart', moveableDragStartHandler, false );
// movable.addEventListener( 'dragend', moveableDragEndHandler, false );
//
// copyable.addEventListener( 'dragstart', moveableDragStartHandler, false );
//
// droppable.addEventListener( 'dragenter', droppableEnterHandler, false );
// droppable.addEventListener( 'dragover', droppableEnterHandler, false );
// droppable.addEventListener( 'dragleave', droppableLeaveHandler, false );
// droppable.addEventListener( 'drop', dropHandler, false );
//
// })(window, document);


/********************************
 * Simple Lightbox
 * 1.4.1.8
 *
 *******************************/

// var body = document.querySelector( 'body' ),
//     lightboxDemo = document.getElementById( 'lightbox-demo' ),
//     lightboxLinks = document.querySelectorAll( 'a.lightbox' ),
//     wapuuLink = lightboxLinks[0],
//     overlay = document.createElement( 'div' ),
//     overlayCloseLink = document.createElement( 'a' ),
//     overlayCloseText = document.createTextNode( 'X' ),
//     displayOverlay,
//     openLightbox,
//     closeLightBox,
//     addImageToOverlay;
//
// closeLightBox = function closeLightBox( e ) {
//
//   e.preventDefault();
//   overlayCloseLink.removeEventListener( 'click', closeLightBox, false );
//   overlay.querySelector( 'img' ).remove();
//   overlay.remove();
//
// };
//
// displayOverlay = function displayOverlay() {
//
//   overlay.setAttribute( 'id', 'overlay'  );
//   overlayCloseLink.appendChild( overlayCloseText );
//   overlayCloseLink.setAttribute( 'href', '#' );
//   overlayCloseLink.classList.add( 'close' );
//   overlayCloseLink.addEventListener( 'click', closeLightBox, false );
//
//   overlay.appendChild( overlayCloseLink );
//   body.appendChild( overlay );
//   //console.log( 'here' );
//
// };
//
// addImageToOverlay = function addImageToOverlay( img ) {
//
//   overlay.appendChild( img )
//
// }
//
// openLightbox = function openLightbox( e ) {
//
//   e.preventDefault();
//   displayOverlay();
//   addImageToOverlay( e.target.cloneNode() );
//
// };
//
//
//
// wapuuLink.addEventListener( 'click', openLightbox );
//
// lightboxDemo.style.display = 'block';


// End 1.4.1
