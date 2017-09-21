var express = require('express');
var app = express();
var serv = require('http').Server(app);

app.get('/', function(req, res){
	res.sendFile(__dirname + '/client/index.html');
});
app.use('/client', express.static(__dirname + '/client'));

serv.listen(2000);
console.log('Server started.')


var SOCKET_LIST = {};
var PLAYER_LIST = {};

var Player = function(id){
	var self = {
		x:Math.random() * 5 - 2.5,
		y:Math.random() * 5 - 2.5,
		id: id,
	}
	self.updatePosition = function(){
		if (self.pressingRight){
			self.x += 0.1
		}
		if (self.pressingLeft){
			self.x -= 0.1
		}
		if (self.pressingUp){
			self.y += 0.1
		}
		if (self.pressingDown){
			self.y -= 0.1
		}
	}
	return self;
}



var io = require('socket.io')(serv,{});
io.sockets.on('connection', function(socket){
	socket.id = Math.random();
	var socket_id = socket.id;
	SOCKET_LIST[socket.id] = socket;

	var player = Player(socket.id);
	PLAYER_LIST[socket.id] = player;

	console.log('socket connection ' + socket.id);

	var createPlayers = {
		list: PLAYER_LIST,
		id: socket.id,
	};
	socket.emit('createPlayers', createPlayers);

	socket.broadcast.emit('newPlayer', player);


	socket.on('newConnection', function(){

	})


	socket.on('keyPress', function(data){
		if (data.inputId === 'left'){
			player.pressingLeft = data.state;
		}
		if (data.inputId === 'right'){
			player.pressingRight = data.state;
		}
		if (data.inputId === 'up'){
			player.pressingUp = data.state;
		}
		if (data.inputId === 'down'){
			player.pressingDown = data.state;
		}
	})


  socket.on('disconnect', function(){
		delete SOCKET_LIST[socket.id];
		delete PLAYER_LIST[socket.id];
		console.log('disconnected ' + socket_id)
		socket.broadcast.emit('usergone', {
    	'left_user' : socket_id
    });
  })


});


setInterval(function(){
	var pack = [];
	for (var i in PLAYER_LIST){
		var player = PLAYER_LIST[i];
		player.updatePosition();
		pack.push({
			x:player.x,
			y:player.y,
			id:player.id
		});
	}
	for (var i in SOCKET_LIST){
		var socket = SOCKET_LIST[i];
		socket.emit('newPositions', pack);
	}

}, 1000/25);