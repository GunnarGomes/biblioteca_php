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
            query = termo;
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

                const titulo = info.title || "Sem título";
                const autores = info.authors?.join(", ") || "Desconhecido";
                const isbn = (
                    info.industryIdentifiers?.find(id => id.type === "ISBN_13")?.identifier ||
                    info.industryIdentifiers?.find(id => id.type === "ISBN_10")?.identifier ||
                    "Sem ISBN"
                );

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
                    <h3>${titulo}</h3>
                    <p><strong>Autores:</strong> ${autores}</p>
                    <p><strong>Publicado:</strong> ${info.publishedDate || "Data desconhecida"}</p>
                    <button type="button">Cadastrar</button>
                `;

                // Adiciona comportamento ao botão
                const botao = texto.querySelector("button");
                botao.addEventListener("click", () => {
                    fetch("http://localhost:8081/biblioteca_php/cadastrar_livro", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            titulo: titulo,
                            autor: autores,
                            isbn: isbn
                        })
                    })
                    .then(async resp => {
                        const texto = await resp.text(); // captura a resposta como texto
                        console.log("Resposta da API:", texto); // veja no console o que veio

                        // tente converter em JSON somente se for válido
                        try {
                            const json = JSON.parse(texto);
                            alert("Livro cadastrado com sucesso!");
                        } catch (erro) {
                            console.error("Resposta não é JSON válido:", texto);
                            alert("Erro: a resposta do servidor não é JSON.");
                        }
                    })
                    .catch(err => {
                        console.error("Erro na requisição:", err);
                        alert("Erro ao enviar os dados.");
                    });

                });

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
