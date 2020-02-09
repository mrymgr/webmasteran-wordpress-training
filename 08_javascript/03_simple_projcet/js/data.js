/**
 * Main JSON object of posts, pages and settings
 */
let posts =
        [
            {
                "id": 1,
                "date": "2016-01-09T22:05:09",
                "modified": "2016-01-09T22:05:09",
                "slug": "hello-world",
                "type": "posts",
                "title": "Hello world!",
                "content": "Welcome to WordPress. This is your first post. Edit or delete it, then start writing! "
            },
            {
                "id": 2,
                "date": "2016-01-10T22:05:09",
                "modified": "2016-01-10T22:05:09",
                "slug": "learning-javascript",
                "type": "posts",
                "title": "Learning JavaScript!",
                "content": "I'm learning JavaScript and super excited!!! "
            },
            {
                "id": 3,
                "date": "2016-01-11T22:05:09",
                "modified": "2016-01-11T22:05:09",
                "slug": "rest-api",
                "type": "posts",
                "title": "The REST API!",
                "content": "I've started working with the REST API in WordPress, what fun! "
            },
            {
                "id": 4,
                "date": "2016-01-12T22:05:09",
                "modified": "2016-01-12T22:05:09",
                "slug": "json-data",
                "type": "posts",
                "title": "JSON Data!",
                "content": "So, with the REST API it is posible to pull in WordPress data as pure JSON.  Now I'm figuring out what to do with the data "
            },
            {
                "id": 5,
                "date": "2016-01-13T22:05:09",
                "modified": "2016-01-13T22:05:09",
                "slug": "javascript-project",
                "type": "posts",
                "title": "JavaScript Project",
                "content": "I've started working with the REST API in WordPress, what fun! "
            },
            {
                "id": 6,
                "date": "2018-01-13T22:05:09",
                "modified": "2018-01-13T22:05:09",
                "slug": "gholam-project",
                "type": "posts",
                "title": "Gholam Project",
                "content": "Gholam has started working with the REST API in WordPress, what fun! "
            }
            ,
            {
                "id": 7,
                "date": "2019-01-13T22:05:09",
                "modified": "2019-01-13T22:05:09",
                "slug": "Gholam-sun-project",
                "type": "posts",
                "title": "Gholam sun Project",
                "content": "Gholam sun has started working with the REST API in WordPress, what fun! "
            }
        ],
    jsonData = JSON.stringify(posts);
