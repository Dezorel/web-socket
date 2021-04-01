const inputs = document.getElementsByTagName('input')
const AllMessages = document.getElementsByClassName('temp')
const mes = document.createElement('div')
const ws = new WebSocket('ws://localhost:2346')

function SendMessage(){
    const nameInput = inputs[0].value //name
    const messageInput = inputs[1].value //message
    let info = {
        users:{
            count: 1,
            nameUsers:[nameInput]
        },
        messages:{
            message: messageInput
        }
    }
    ws.send(JSON.stringify(info))
    inputs[0].value = ''
    inputs[1].value = ''
}

ws.onmessage = response =>{
    let info = JSON.parse(response.data)
    //mes.textContent = info.messages.message
    mes.innerHTML += '<p>'+ info.messages.message +'</p>'
    const finalMes = document.getElementById('final')
    let parent = finalMes.parentNode
    parent.insertBefore(mes, finalMes)
}

