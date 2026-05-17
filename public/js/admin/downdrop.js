

    const dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach(dropdown => {

        const btn = dropdown.querySelector(".dropdown-btn");

        btn.addEventListener("click", () => {

            dropdown.classList.toggle("active");

        });

    });

