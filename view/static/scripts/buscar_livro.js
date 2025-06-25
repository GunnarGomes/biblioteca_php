var search_term = document.getElementById("searchterm")
const link = "https://www.googleapis.com/books/v1/volumes?q="

search_term.addEventListener("input", () => {
    var termo = e.target.value

    fetch(link + termo)
        .then(response => response.json())
        .then(data => {
            return data
        })
        .catch(error => {
            console.error("Erro na requisição GET:", error)
        })
})
