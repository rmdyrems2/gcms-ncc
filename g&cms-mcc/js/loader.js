// JavaScript to hide the loader and show the content when the page has loaded.
document.addEventListener("DOMContentLoaded", function() {
    const loader = document.querySelector(".loader-wrapper");
    const content = document.querySelector(".content");
    loader.style.display = "none";
    content.style.display = "block";
});
