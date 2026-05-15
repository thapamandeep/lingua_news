
const slider = document.querySelector('.latest-news-grid');

function slideRight(){
    slider.scrollBy({
        left: slider.offsetWidth,
        behavior: 'smooth'
    });
}

function slideLeft(){
    slider.scrollBy({
        left: -slider.offsetWidth,
        behavior: 'smooth'
    });
}
