/**
 * Router file for managing url changes
 * */


/**
 * Main router object
 *
 */
let router = {

    /**
     * Initialized the router
     */
    init: function () {
        this.loadContent();
        this.listenPageChange();

    },

    /**
     * Gets the slug from the url
     *
     * @return slug {string} Slug for content
     */
    getSlug: function () {
        let slug = window.location.hash;
        if ("" === slug) {
            return null;
        } else {
            return slug.substring(1);
        }
    },

    /**
     * Determines what to load in the view
     */
    loadContent: function () {
        let slug = router.getSlug();
        view.clearContent();
        if ( null === slug) {
            view.loadBlogPosts();
        } else {
            console.log('load post' + slug);
        }

    },

    /**
     * Listener function for URL changes
     * 
     */
    listenPageChange: function () {
        window.addEventListener('hashchange', this.loadContent, false)
    }



};