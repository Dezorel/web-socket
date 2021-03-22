const bodyElement = document.getElementById('wrapper')
const unit = document.getElementById('unit')
unit.style.backgroundColor = Math.random() < 0.5 ? 'red' : 'green'
// Открываем websocket соединение

const ws = new WebSocket('ws://localhost:2346')

bodyElement.addEventListener('keyup', event=>{
    let top = unit.style.top ? unit.style.top : 0
    let left = unit.style.left ? unit.style.left : 0
    const step = 7

    if(event.code == 'ArrowUp'){
        unit.style.top = parseInt(top) - step + 'px'
    }else if(event.code == 'ArrowDown'){
        unit.style.top = parseInt(top) + step + 'px'
    }else if(event.code == 'ArrowLeft'){
        unit.style.left = parseInt(left) - step + 'px'
    }else if(event.code == 'ArrowRight'){
        unit.style.left = parseInt(left) + step + 'px'
    }

    let positionData = {        //пересылаемый объект через вебсокет
        top: unit.style.top,
        left: unit.style.left
    }
    ws.send(JSON.stringify(positionData))       //отпарвлляем данные JSON
})

//обработчик получения данных

ws.onmessage = response =>{
    let positionData = JSON.parse(response.data)
    console.log(positionData)
    unit.style.top = positionData.top
    unit.style.left = positionData.left
}



