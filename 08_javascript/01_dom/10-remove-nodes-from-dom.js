/********************************
 * Removing Nodes from DOM
 * =======================
 *
 * 1. Removing a Node with .remove()
 * 2. Removing a Node with .removeChild()
 *
 *******************************/

let pEl = document.querySelector('li');
pEl.remove();


/********************************
 * Removing a Node with .removeChild()
 *
 *******************************/

let posts = document.querySelector('.posts'),
    firstPost = posts.querySelector('li'),
    trash = document.querySelector('.trash'),
    trashPosts = document.querySelector('.trash.posts'),
    oldEl;

oldEl = posts.removeChild(firstPost);
trashPosts.appendChild(oldEl);
trash.classList.remove('hidden');
