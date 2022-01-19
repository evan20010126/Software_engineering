//import express 和 ws 套件
const express = require('express')
const SocketServer = require('ws').Server

//指定開啟的 port
const PORT = 3000

//創建 express 的物件，並綁定及監聽 3000 port ，且設定開啟後在 console 中提示
const server = express()
    .listen(PORT, () => console.log(`Listening on ${PORT}`))

//將 express 交給 SocketServer 開啟 WebSocket 的服務
const wss = new SocketServer({ server })

//當 WebSocket 從外部連結時執行
// wss.on('connection', ws => {
//     console.log('Client connected')

//     //固定送最新時間給 Client
//     const sendNowTime = setInterval(()=>{
//         // ws.send(String(new Date()))
//         ws.send("hello");
//     },1000)

//     ws.on('message', data => {
//         ws.send(data)
//     })

//     ws.on('close', () => {
//         //連線中斷時停止 setInterval
//         clearInterval(sendNowTime)
//         console.log('Close connected')
//     })
// })
wss.on('connection', ws => {
    console.log('Client connected')

    ws.on('message', data => {
        //取得所有連接中的 client
        console.log(data)
        let clients = wss.clients
        //做迴圈，發送訊息至每個 client
        clients.forEach(client => {
            client.send(data[0])
        })
    })

    ws.on('close', () => {
        console.log('Close connected')
    })
})

