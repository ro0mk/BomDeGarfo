const titulo = document.getElementById('titulo')
const descricao = document.getElementById('descricao')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
    let mensagens = []
    if (titulo.value === '' || titulo.value ==null) {
        mensagens.push ('Insira um titulo!')
    }

    if (mensagens.length > 0) {
      e.preventDefault()  
      errorElement.innerText = mensagens.join(', ')
    }
    
})

form.addEventListener('submit', (e) => {
    let mensagens = []
    if (descricao.value === '' || descricao.value ==null) {
        mensagens.push ('Insira uma descrição!')
    }

    if (mensagens.length > 0) {
      e.preventDefault()  
      errorElement.innerText = mensagens.join(', ')
    }
    
})