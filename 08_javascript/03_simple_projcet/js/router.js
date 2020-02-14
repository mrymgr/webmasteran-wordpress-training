'use strict';

/**
 * Router file for managing url changes
 * */


/**
 * Main router object
 *
 */
class Router {

    /**
     * Initialized the router
     */
    init() {
        this.loadContent();
        this.listenPageChange();

    }

    /**
     * Gets the slug from the url
     *
     * @return slug {string} Slug for content
     */
    getSlug() {
        let slug = window.location.hash;
        if ("" === slug) {
            return null;
        } else {
            return slug.substring(1);
        }
    }

    /**
     * Determines what to load in the view
     */
    loadContent() {
        let slug = router.getSlug();

        view.clearContent();
        if (null === slug) {
            view.loadSingleContent('home');
        } else if ( 'blog' === slug ){
            view.loadBlogPosts();
        } else {
            /*console.log('load post' + slug);
            console.log(model.getPost(slug));*/
            view.loadSingleContent(slug);
        }

    }

    /**
     * Listener function for URL changes
     *
     */
    listenPageChange() {
        window.addEventListener('hashchange', this.loadContent, false)
    }

}

let router = new Router();