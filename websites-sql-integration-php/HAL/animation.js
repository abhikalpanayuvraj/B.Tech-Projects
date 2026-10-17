const cards = document.querySelectorAll(".slideRight");

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        } else {
            entry.target.classList.remove("show"); // Reverse animation
        }

    });
}, {
    threshold: 0.2
});

cards.forEach(card => observer.observe(card));


// cursor
const cursor = document.querySelector(".custom-cursor");

let mouseX = 0;
let mouseY = 0;

let cursorX = 0;
let cursorY = 0;

document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

function animateCursor() {
    cursorX += (mouseX - cursorX) * 0.15;
    cursorY += (mouseY - cursorY) * 0.15;

    cursor.style.left = cursorX + "px";
    cursor.style.top = cursorY + "px";

    requestAnimationFrame(animateCursor);
}

animateCursor();


// bgvideo

const video = document.getElementById("bg-video");

document.addEventListener("click", () => {
    video.muted = false;
    video.play();
}, { once: true });