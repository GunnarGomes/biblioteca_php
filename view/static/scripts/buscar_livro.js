const search_term = document.getElementById("searchterm");
const categoria = document.getElementById("categoria");
const link = "https://www.googleapis.com/books/v1/volumes?q=";

function realizarBusca() {
    const termo = search_term.value.trim();
    if (termo.length < 3) return;

    let query = "";

    switch (categoria.value) {
        case "isbn":
            if (/^\d{10,13}$/.test(termo)) {
                query = `isbn:${termo}`;
            } 
            break;
        case "autor":
            query = `inauthor:${termo}`;
            break;
        case "titulo":
            query = `intitle:${termo}`;
            break;
        default:
            query = termo; // busca genérica
    }

    fetch(link + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById("resultados");
            container.innerHTML = "";

            if (!data.items) {
                container.innerHTML = "<p>Nenhum livro encontrado</p>";
                return;
            }

            data.items.forEach(item => {
                const info = item.volumeInfo;

                const livroDiv = document.createElement("div");
                livroDiv.style.border = "1px solid #ddd";
                livroDiv.style.padding = "10px";
                livroDiv.style.margin = "10px 0";
                livroDiv.style.display = "flex";
                livroDiv.style.gap = "10px";

                const img = document.createElement("img");
                img.src = info.imageLinks?.thumbnail || "https://via.placeholder.com/128x180?text=Sem+Capa";
                img.alt = "Capa do livro";
                img.width = 128;
                img.height = 180;

                const texto = document.createElement("div");
                texto.innerHTML = `
                    <h3>${info.title}</h3>
                    <p><strong>Autores:</strong> ${info.authors?.join(", ") || "Desconhecido"}</p>
                    <p><strong>Publicado:</strong> ${info.publishedDate || "Data desconhecida"}</p>
                `;

                livroDiv.appendChild(img);
                livroDiv.appendChild(texto);
                container.appendChild(livroDiv);
            });
        })
        .catch(error => {
            console.error("Erro na requisição GET:", error);
        });
}

// Eventos
search_term.addEventListener("input", realizarBusca);
categoria.addEventListener("change", () => {
    if (search_term.value.trim().length >= 3) {
        realizarBusca();
    }
});
