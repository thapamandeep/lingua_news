document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('choose-language');

    if (!select) return;

    select.addEventListener('change', function () {
        fetch('/set-language', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                language: this.value
            })
        }).then(() => location.reload());
    });
});



