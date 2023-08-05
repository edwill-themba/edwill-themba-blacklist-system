const import_csv = document.querySelector(".radio-one")
const add_manually = document.querySelector(".radio-two")
const csv = document.querySelector(".import-csv")
const manually = document.querySelector(".add-manually")

import_csv.addEventListener('click', () => {
    csv.classList.toggle('active')
    manually.classList.remove('active')
})

add_manually.addEventListener('click', () => {
    manually.classList.toggle('active')
    csv.classList.remove('active')
})