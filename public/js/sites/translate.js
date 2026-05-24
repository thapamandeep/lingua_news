
document.getElementById('choose-language').addEventListener('change', function () {
    let lang = this.value;

    if (lang) {
        window.location.href = "/change-language/" + lang;
    }
    
});

document.getElementById('choose-language').addEventListener('change', function () {

    let lang = this.value;

    fetch("/change-language", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ language: lang })
    })
    .then(() => {
        location.reload();
    });

});