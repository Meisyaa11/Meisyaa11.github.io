function toggleMode() {
    const modeButton = document.getElementById('mode');
    const body = document.body;
    const navbar = document.querySelector('.navbar');

    body.classList.toggle("darkmode");
    navbar.classList.toggle("navbar-darkmode");

    if (body.classList.contains("darkmode")) {
        modeButton.innerHTML = "Light Mode";
    } else {
        modeButton.innerHTML = "Dark Mode";
    }
}

function openPopup() {
    document.getElementById("popup-box").style.display = "block";
}

function closePopup() {
    document.getElementById("popup-box").style.display = "none";
}

window.addEventListener("load", openPopup);

function showCaption(caption) {
    const captionBox = document.createElement('div');
    captionBox.className = 'caption-box';
    captionBox.textContent = caption;

    const popupContent = document.querySelector('.popup-content');
    popupContent.appendChild(captionBox);
}

const photoElements = document.querySelectorAll('.photo');
photoElements.forEach(photo => {
    photo.addEventListener('click', () => {
        const caption = photo.querySelector('img').getAttribute('data-caption');
        showCaption(caption);
    });
});

function showPopup2() {
    var popup = document.getElementById("popup2");
    popup.style.display = "block";
}

function closePopup2() {
    var popup = document.getElementById("popup2");
    popup.style.display = "none";
}