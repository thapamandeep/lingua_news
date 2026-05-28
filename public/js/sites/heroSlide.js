document.addEventListener("DOMContentLoaded", function () {

    const heroNews = window.heroNewsData || [];
    let index = 0;

    const heroImage = document.querySelector(".main-img img");
    const heroTitle = document.querySelector(".hero-title");
    const heroTime = document.querySelector(".news-time");
    const heroLink = document.querySelector(".hero-link");

    if (!heroNews.length || !heroImage || !heroTitle) {
        return;
    }

    setInterval(() => {

        index = (index + 1) % heroNews.length;

        const current = heroNews[index];

        // IMAGE
        heroImage.src = "/storage/gallery/" + current.image;

        // TITLE
        heroTitle.textContent = current.title ?? "No Title";

        // DATE
        if (heroTime) {
            heroTime.textContent = current.date ?? "";
        }

        // LINK (VERY IMPORTANT 🔥)
        if (heroLink) {
            heroLink.href = "/detail-news/" + current.id;
        }

    }, 3000);

});