let getBigImage = document.querySelector('#garden-examples>figure img');
let getBigImageCaption = document.querySelector('#garden-examples>figure figcaption')
let getImages = document.querySelectorAll('#garden-examples .image-gallery img');

getImages.forEach(function(image) {

    function imageChange() {
        image.style.cursor = "pointer";
        changeImage(image);
        removeCurrentSelected();
        image.classList.add('selectedImage');
    }

    image.addEventListener("mouseover", () => {
        imageChange();
    })

    image.addEventListener("focus", () => {
        imageChange();
    })
})

function removeCurrentSelected() {
    getImages.forEach(function(img) {
        img.classList.remove('selectedImage');
    })
}

function changeImage(image) {
    getBigImage.src = image.src;
    getBigImage.alt = image.alt;
    getBigImageCaption.innerHTML = image.alt;
}