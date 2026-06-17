window.addEventListener('load', function () {

    setTimeout(function () {

        // Hide preloader
        document.getElementById('preloader').style.display = 'none';

        // About page elements
        const featureBox = document.querySelector('.hero-features');
        const storyCard = document.querySelector('.story-card');
        const items = document.querySelectorAll('.feature-item');

        // 1. Feature box slides first
        if (featureBox) {
            featureBox.classList.add('show-feature');
        }

        // 2. Story card slides after feature box
        if (storyCard) {
            setTimeout(() => {
                storyCard.classList.add('show-story');
            }, 900);
        }

        // 3. Feature items appear one by one
        if (items.length > 0) {

            setTimeout(() => {
                items[0]?.classList.add('show-item');
            }, 1200);

            setTimeout(() => {
                items[1]?.classList.add('show-item');
            }, 1500);

            setTimeout(() => {
                items[2]?.classList.add('show-item');
            }, 1800);

            setTimeout(() => {
                items[3]?.classList.add('show-item');
            }, 2100);

        }

    }, 2000);

});