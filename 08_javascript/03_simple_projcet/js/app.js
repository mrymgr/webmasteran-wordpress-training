'use strict';
/**
 * Main app file.  Initializes app components.
 */


/**
 * The main app class.
 *
 */

class VanillaPress {
    init() {
        // Add any functions here you want
        // to run to start the application
        //console.log( jsonData );
        //console.log(model);
        model.init();
        router.init();


    }
}

let vanillaPress = new VanillaPress();
vanillaPress.init();

