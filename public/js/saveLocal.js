const resetButton = document.getElementById('reset')
//const inputs = document.getElementsByTagName('input')

resetButton.addEventListener("click", (e) => {
    sessionStorage.clear()
    location.reload()
})

window.addEventListener("load", (e) => {
    const checkboxes = document.querySelectorAll(".form-check-input")
    const inputsText = document.querySelectorAll(".form-control")

    for(input of inputsText){
        if(sessionStorage.getItem(input.name)){
            input.value = sessionStorage.getItem(input.name)
        }
    }

    for(check of checkboxes){
        if(sessionStorage.getItem(check.value)){
            check.checked = !check.checked
        }
    }

    for(input of inputsText){
        input.addEventListener("keyup", (e) => {
            sessionStorage.setItem(e.target.name, e.target.value)
        })
    }

    for(check of checkboxes){
        check.addEventListener("change", (e) => {
            if(e.target.checked){
                sessionStorage.setItem(e.target.value, e.target.value)
            } else {
                sessionStorage.removeItem(e.target.value)
            }
        })
    }
})
