console.log("Lingua News Author Dashboard Loaded");


const dropdowns = document.querySelectorAll('.dropdown-btn');

dropdowns.forEach(button => {

    button.addEventListener('click', () => {

        button.parentElement.classList.toggle('active');

    });

});