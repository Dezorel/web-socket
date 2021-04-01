const inputs = document.getElementsByTagName('input')
const blockMes = document.createElement('div')
const ws = new WebSocket('ws://localhost:2346')

let users

function SendMessage(){
    const nameInput = inputs[0].value //name
    const messageInput = inputs[1].value //message
    let info = {
        users:{
            count: 1,
            nameUsers:[users]
        },
        messages:{
            message: messageInput
        }
    }
    info.users.nameUsers.push(nameInput)
    ws.send(JSON.stringify(info))
    inputs[0].value = ''
    inputs[1].value = ''
}

ws.onmessage = response =>{
    let info = JSON.parse(response.data)
    console.log(info)
    for(let i=0; i<info.users.count; i++){
        blockMes.innerHTML = '<p>'+ info.users.nameUsers +': '+info.messages.message +'</p>'
        const finalMes = document.getElementById('final')
        let parent = finalMes.parentNode
        parent.insertBefore(blockMes, finalMes)
    }
    users = info.users.nameUsers
}

