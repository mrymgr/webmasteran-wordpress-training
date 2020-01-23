/********************************
 * Getting a Form in html
 * ======================
 *
 * document.forms
 * not common - return is HTMLCollection - if you have several forms on a page, it will be appicable
 *
 * document.getElementById() --> not common
 *
 * document.getElementsByName()
 * The return is a Nodelist. So it's like an array.
 * if you want to use, you must uuse from its index
 *
 *
 *******************************/
let forms = document.forms, form1 = forms[0];
let contactForm = document.getElementById('main-contact');
let contactForm1 = document.getElementsByName('main-contact')[0];


/********************************
 * Selecting Elements in a Form
 * ============================
 *
 * 1- Loop through elements
 * 2- Select specific elements:
 * getElementById, querySelector, getElementsByName
 *
 * Note: in first solution, you can not get forms elements separately
 * if fieldset tag wraps them.
 *
 *
 *******************************/
for (let i = 0, max = form1.length; i < max; i++) {
    console.log(form1[i]);
}

mainForm = document.getElementById('main-contact');
let fullName = document.getElementById('fullName'),
    subject = mainForm.querySelector('select'),
    message = document.getElementsByName('message')[0],
    contactPreference = document.getElementsByName('contact-preference');
console.log(fullName,
    subject,
    message,
    contactPreference);

/********************************
 * Selecting Values of Form
 * ========================
 * formElement.value
 * formElement.Name
 *
 *******************************/
mainForm = document.getElementById('main-contact');
for (let i = 0, max = mainForm.length; i < max; i++) {
    console.log(mainForm[i].name, mainForm[i].value);
}

/********************************
 * Setting New Value of Form
 * =========================
 * formElement.value = 'New value';
 *
 *******************************/
mainForm = document.getElementById('main-contact'),
    fullName = document.getElementById('fullName'),
    phonePreference = document.getElementsByName('contact-preference')[1];
fullName.value = 'Mehdi Soltani';
phonePreference.value = 'checked';
console.log(phonePreference);




