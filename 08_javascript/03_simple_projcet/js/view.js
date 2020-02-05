/**
 * View file for displaying content
 * */

/**
 * Main view object
 *
 * */

let view = {

    /**
   	 * @var posts array of post objects
   	 */
    posts: model.getPosts(),
    /**
     * Init function for view object
     */
    init: function () {

        this.loadBlogPosts();
    },

    /**
     * Get blog post and appends them to the page.
     */
    loadBlogPosts: function () {
        let postMarkup = document.createDocumentFragment(),
            primaryContentEl = helpers.getPageContentEl();
        for (let i = 0 , max = this.posts.length; i < max ; i++) {
            console.log('yes:' + i);
            postMarkup.appendChild(this.createPostMarkup(this.posts[i]))
        }

    },

    /**
     * Create Markup for blog posts
     *
     * @param object {post} Post to create markup
     * @return object {articleEl} Final post markup
     */
    createPostMarkup: function (post) {

        console.log(post);
    }
};

view.init();