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
            postMarkup.appendChild(this.createPostMarkup(this.posts[i]))

        }
        primaryContentEl.appendChild(postMarkup);

    },

    /**
     * Create Markup for blog posts
     *
     * @param object {post} Post to create markup
     * @return object {articleEl} Final post markup
     */
    createPostMarkup: function (post) {

        let articleEl = document.createElement('article'),
            titleEl = document.createElement('h3'),
            titleLink = document.createElement('a'),
            titleText = document.createTextNode(post.title),
            contentEl = document.createElement('div');

        titleLink.appendChild(titleText);
        titleLink.href = '#' + post.slug;
        titleEl.appendChild(titleLink);

        contentEl.appendChild(document.createTextNode(post.content));

        articleEl.appendChild(titleEl);
        articleEl.appendChild(contentEl);

        return articleEl;

    }
};

