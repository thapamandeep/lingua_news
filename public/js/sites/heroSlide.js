document.addEventListener("DOMContentLoaded", function () {

    const heroNews = window.heroNewsData || [];
    let index = 0;

    const heroImage = document.querySelector(".main-img img");
    const heroTitle = document.querySelector(".main-news-text h2");
    const heroTime = document.querySelector(".news-time");

    // safety check
    if (!heroNews.length || !heroImage || !heroTitle) {
        console.log("Hero slider stopped: missing data or elements");
        return;
    }

    setInterval(() => {

        index = (index + 1) % heroNews.length;

        heroImage.src = "/storage/gallery/" + heroNews[index].image;
        heroTitle.textContent = heroNews[index].title;

        if (heroTime) {
            heroTime.textContent = heroNews[index].date ?? "";
        }

    }, 3000);

});