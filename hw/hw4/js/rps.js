var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById('btnGo');
	deselectAll();
}
	
function deselectAll() {
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
}

function go() {
	var numChoice = Math.floor(Math.random()*3);
	var imgComputer =document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(numChoice == 0) {
		computerChoice = 'rock';
		imgComputer.src = 'img/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') alert('TIE');
		else if(playerChoice=='paper') alert('YOU WIN');
		else if(playerChoice=='scissors') alert('YOU LOSE');
	}
	
	if(numChoice == 1) {
		computerChoice = 'paper';
		imgComputer.src = 'img/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') alert('YOU LOSE');
		else if(playerChoice=='paper') alert('TIE');
		else if(playerChoice=='scissors') alert('YOU WIN');
	}

	if(numChoice == 2) {
		computerChoice = 'scissors';
		imgComputer.src = 'img/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') alert('YOU WIN');
		else if(playerChoice=='paper') alert('YOU LOSE');
		else if(playerChoice=='scissors') alert('YOU TIE');
	}

}

function select(choice) {
	playerChoice = choice;
	
	imgPlayer.src = 'img/' + choice + '.png';
	deselectAll();
	if (choice=='rock') btnRock.style.backgroundColor = '#888888';
	if (choice=='papper') btnPaper.style.backgroundColor = '#888888';
	if (choice=='scissors') btnScissors.style.backgroundColor = '#888888';
	
	btnGo.style.display = 'block';
}

