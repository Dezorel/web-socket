const bodyElement = document.getElementById('wrapper')
const unit = document.getElementById('unit')
const me = document.getElementById('me')

unit.style.backgroundColor = Math.random() < 0.5 ? 'red' : 'red'
me.style.backgroundColor = Math.random() < 0.5 ? 'green' : 'green'
// Открываем websocket соединение

const ws = new WebSocket('ws://localhost:2346')

bodyElement.addEventListener('keydown', event=>{
    let top = me.style.top ? me.style.top : 0
    let left = me.style.left ? me.style.left : 0
    const step = 7

    if(event.code == 'ArrowUp'){
        me.style.top = parseInt(top) - step + 'px'
    }else if(event.code == 'ArrowDown'){
        me.style.top = parseInt(top) + step + 'px'
    }else if(event.code == 'ArrowLeft'){
        me.style.left = parseInt(left) - step + 'px'
    }else if(event.code == 'ArrowRight'){
        me.style.left = parseInt(left) + step + 'px'
    }

    let positionData = {        //пересылаемый объект через вебсокет
      user1:{
          top: unit.style.top,
          left: unit.style.left
      },
      user2:{
          top: me.style.top,
          left: me.style.left
      }
    }
    ws.send(JSON.stringify(positionData))       //отпарвлляем данные JSON
})

//обработчик получения данных

ws.onmessage = response =>{
    let positionData = JSON.parse(response.data)
    unit.style.top = positionData.user2.top
    unit.style.left = positionData.user2.left
    console.log('get')
}



