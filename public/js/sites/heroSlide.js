document.addEventListener("DOMContentLoaded", function () {

    const heroNews = window.heroNewsData || [];

    let index = 0;

    const heroImage = document.getElementById("heroImage");
    const heroTitle = document.getElementById("heroTitle");

    if (!heroNews.length || !heroImage || !heroTitle) return;

    setInterval(() => {

        index = (index + 1) % heroNews.length;

        heroImage.src = "/storage/gallery/" + heroNews[index].image;
        heroTitle.textContent = heroNews[index].title;

    }, 3000);

});