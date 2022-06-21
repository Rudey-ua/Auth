const titleToPhoto = "http://auth.com/"

const input = Array.from(document.querySelectorAll(".files"))
const result = document.querySelector("#result")
const labels = Array.from(document.querySelectorAll(".group_container"))
const fullContainers = Array.from(document.querySelectorAll(".full_container"))
const deleteButtons = Array.from(document.querySelectorAll(".delete_button"))
const deletedImages = []
const addedImages = []

const getImagePreview = (url) => `
<div class="added_photo_container">
    <div class="image_container">
        <img class="image" src=${url}>
    </div>
</div>
`

const getDeleteButton = () => `
    <button class="delete_button"></button>
`

function render(images) {
    for(let i = 0; i < images.length; i++) {
        addedImages.push(images[i].img_src )
    }
    for(let i = 0; i < images.length; i++){
        const url = "../" + images[i].img_src.toString()
        labels[i].insertAdjacentHTML("beforeend", getImagePreview(url))
        fullContainers[i].insertAdjacentHTML("beforeend", getDeleteButton())
    }
}

for (let inp of input) {
    inp.addEventListener("change", (e) => {
            if(e.target.closest(".group_container").querySelector(".image")){
                let imgSrc = e.target.closest(".group_container").querySelector(".image").src
            }
            if (e.target.files[0]) {
                if(e.target.closest(".group_container").querySelector(".image")){
                    deletedImages.push(imgSrc)
                }
                const url = URL.createObjectURL(e.target.files[0])
                e.target.closest(".group_container").insertAdjacentHTML("beforeend", getImagePreview(url))
                e.target.closest(".full_container").insertAdjacentHTML("beforeend", getDeleteButton())
            }
    })
}

result.addEventListener("click", (e) => {
    if (e.target.matches(".delete_button")) {
        let sibling = e.target.closest(".full_container");

        while (sibling) {
            const matchedChild = sibling.querySelector(".added_photo_container");

            const matchedInputChild = sibling.querySelector(".files");
            if(matchedInputChild){
                matchedInputChild.value = ""
            }

            if (matchedChild) {
                console.log(addedImages.includes(matchedChild.querySelector(".image").src.replace(titleToPhoto, "")))
                console.log(matchedChild.querySelector(".image").src.replace(titleToPhoto, ""))
                console.log(addedImages)
                if(addedImages.includes(matchedChild.querySelector(".image").src.replace(titleToPhoto, ""))){
                    deletedImages.push(matchedChild.querySelector(".image").src.replace(titleToPhoto, ""))
                }
                matchedChild.remove()
                e.target.remove()
                return
            }

            sibling = sibling.previousElementSibling;
        }
    }
})
