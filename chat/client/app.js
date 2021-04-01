const inputs = document.getElementsByTagName('input')
const ws = new WebSocket('ws://localhost:2346')
let users = []
let message = []

function SendMessage(){
    const nameInput = inputs[0].value //name
    const messageInput = inputs[1].value //message
    let info = {
        users:{
            count: 1,
            nameUsers: users
        },
        messages:{
            message: message
        }
    }
    info.users.nameUsers.push(nameInput)
    info.messages.message.push(messageInput)
    ws.send(JSON.stringify(info))
    inputs[0].value = ''
    inputs[1].value = ''
}

ws.onmessage = response =>{
    let info = JSON.parse(response.data)

    console.log(info)
    for(let i=info.messages.message.length-1; i<info.messages.message.length; i++){
        const blockMes = document.createElement('div')
        blockMes.classList.add('message')
        blockMes.innerHTML = '<p>'+ info.users.nameUsers[i] +': '+info.messages.message[i] +'</p>'
        const finalMes = document.getElementById('final')
        let parent = finalMes.parentNode
        parent.insertBefore(blockMes, finalMes)
    }

    users = info.users.nameUsers
    message = info.messages.message
}

