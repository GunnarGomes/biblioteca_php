var search_term = document.getElementById("searchterm")
const link = "https://www.googleapis.com/books/v1/volumes?q="

search_term.addEventListener("input", () => {
    var termo = e.target.value
    if (termo.length < 3) return;
    
    fetch(link + termo)
        .then(response => response.json())
        .then(data => {
            console.log(data)

            const container = document.getElementById("resultados")
            container.innerHTML = ""

            if (!data.items){
                container.innerHTML = "<p>Nenhum livro encontrado</p>"
                return;
            }

            data.items.forEach(item => {
                const info = item.volumeInfo

                const livroDiv = document.createElement("div") // div do livro

                const img = document.createElement("img")
                img.src = info.imageLinks?.thumbnail || "https://via.placeholder.com/128x180?text=Sem+Capa"
                img.alt = "Capa do livro"
                img.width = 128
                img.height = 180

                const texto = document.createElement("div")
                texto.innerHTML = `
                    <h3>${info.title}</h3>
                    <p><strong>Autores:</strong> ${info.authors?.join(", ") || "Desconhecido"}</p>
                    <p><strong>Publicado:</strong> ${info.publishedDate || "Data desconhecida"}</p>
                `
                livroDiv.appendChild(img)
                livroDiv.appendChild(texto)

                // Adiciona ao container principal
                container.appendChild(livroDiv)
            });

        })
        .catch(error => {
            console.error("Erro na requisição GET:", error)
        })
})
