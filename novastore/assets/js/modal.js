const openBtn = document.querySelectorAll('.openModal')
const closeBtn = document.getElementById("closeModal");
const modal = document.getElementById("modal");

openBtn.forEach(btn => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.add("open");
    });
});

closeBtn.addEventListener("click", () => {
    modal.classList.remove("open");
})