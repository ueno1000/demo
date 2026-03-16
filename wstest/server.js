const http = require('http')
const fs = require('fs')
const WebSocketServer = require('websocket').server
const PORT = 3000

const server = http.createServer((request, response) => {
  const url = request.url
  switch(url) {
    case '/':
      fs.readFile('./public/index.html', 'utf-8', (error, data) => {
        response.writeHead(200, {'Content-Type': 'text/html'})
        response.write(data)
        response.end()
      })
      break
    default:
      response.writeHead(404)
      response.end()
  }

})

// Listener
server.listen(PORT, () => {
  console.log(`${new Date()} Server started http://localhost:${PORT}`)
})

// WebSocket server settings
const wsServer = new WebSocketServer({
  httpServer: server,
  // Do not use autoAcceptConnections in production
  autoAcceptConnections: false
})

const originIsAllowed = (origin) => {
  // Validate whether the request origin is trusted. In this local demo we always return true.
  return true
}

wsServer.on('request', (request) => {
  if (!originIsAllowed(request.origin)) {
    request.reject()
    console.log(`${new Date()} ${request.origin} access from origin was rejected`)
  }

  const connection = request.accept('wstest', request.origin)
  console.log(`${new Date()} connection accepted`)
  
  connection.on('message', message => {
  switch (message.type) {
    case 'utf8':
      console.log(`message: ${message.utf8Data}`)
      //connection.sendUTF(message.utf8Data)
      wsServer.broadcast('Your message is '+message.utf8Data+' !!')
      break
    case 'binary':
      console.log(`binary data: ${message.binaryData.length}byte`)
      connection.sendBytes(message.binaryData)
      break
  }
})

  connection.on('close', (reasonCode, description) => {
    console.log(`${new Date()} ${connection.remoteAddress} was disconnected`)
  })
})
