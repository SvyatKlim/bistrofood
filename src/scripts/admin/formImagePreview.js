const createProductImagePreview = () => {
    const input = document.getElementById("formFile")
    const output = document.querySelector("output")
    let imagesArray = []

    function displayImages() {
        let images = ""
        imagesArray.forEach((image, index) => {
            images += `<div class="image d-flex align-items-center ">
                <img src="${URL.createObjectURL(image)}" alt="image" class="img-thumbnail">
                <button type="button" class="btn btn-danger ms-3 btn-delete" data-index="${index}" > Delete image </button>
              </div>`
        })
        output.innerHTML = images
        if (document.querySelector('.btn-delete')) {
            document.querySelector('.btn-delete').addEventListener('click', function (ev) {
                deleteImage(ev.target.dataset.index);
            })
        }
    }

    function deleteImage(index) {
        imagesArray.splice(index, 1)
        displayImages()
    }
    if (input) {
        input.addEventListener("change", function () {
            const file = input.files
            if (file.length > 0) {
                imagesArray.push(file[0])
                displayImages()
            }
        })
    }
}
export default createProductImagePreview;