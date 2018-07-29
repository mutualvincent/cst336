var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
}
	
function selectRock(){
	imgPlayer.src = 'img/rock.png';
	// alert('rock');
}

function selectPaper(){
	imgPlayer.src = 'img/paper.png';
	// alert('paper');
}

function selectScissors(){
	imgPlayer.src = 'img/scissors.png';
	// alert('scissors');
}

function go() {
	var numChoice = math.floor(Math.random()*3);
	var imgComputer =document.getElementById('imgComputer');
	
	if(numChoice == 0) {
		computerChoice = 'rock';
		imgComputer.src = 'img/rock.png';
	}
	
	if(numChoice == 1) {
		computerChoice = 'paper';
		imgComputer.src = 'img/paper.png';
	}

	if(numChoice == 2) {
		computerChoice = 'scissors';
		imgComputer.src = 'img/scissors.png';
	}
}

