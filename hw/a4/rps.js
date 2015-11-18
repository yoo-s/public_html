var rockImg = "http://i.imgur.com/iFKYWO0.png";
var paperImg = "http://i.imgur.com/omsHpIT.png";
var scissorsImg = "http://i.imgur.com/FA2P4V8.png";
var youScore = 0;
var compScore = 0;

function compPic() {
	var computerChoice = Math.random();
	var computerImg;
	if (computerChoice < 0.34) {
		document.getElementById("img2").src = rockImg;
		computerImg = rockImg;
	} else if(computerChoice <= 0.67) {
		document.getElementById("img2").src = paperImg;
		computerImg = paperImg;
	} else {
		document.getElementById("img2").src = scissorsImg;
		computerImg = scissorsImg;
	}
	return computerImg;
}

function pic1() {
        document.getElementById("img").src = rockImg;
        var youImg = rockImg;
        compImg = compPic();
        winner(youImg, compImg);
}
function pic2() {
        document.getElementById("img").src = paperImg;
        youImg = paperImg;
        compImg = compPic();
        winner(youImg, compImg);
}
function pic3() {
        document.getElementById("img").src = scissorsImg;
        youImg = scissorsImg;
        compImg = compPic();
        winner(youImg, compImg);
}

function winner(youImg, computerImg) {
    if (youImg === computerImg) {
        document.getElementById("winner").innerHTML = "The result is a tie!";
    } else if (youImg == rockImg) {
        if (computerImg == scissorsImg) {
            document.getElementById("winner").innerHTML = "rock wins";
            youScore++;
            document.getElementById("sc1").innerHTML = "" + youScore;
        } else {
            document.getElementById("winner").innerHTML = "paper wins";
            compScore++;
            document.getElementById("sc2").innerHTML = "" + compScore;
        }
    } else if (youImg == paperImg) {
        if (computerImg == rockImg) {
        	document.getElementById("winner").innerHTML = "paper wins";
        	youScore++;
            document.getElementById("sc1").innerHTML = "" + youScore;
        } else {
            document.getElementById("winner").innerHTML = "scissors wins";
            compScore++;
            document.getElementById("sc2").innerHTML = "" + compScore;
        }
    } else if (youImg == scissorsImg) {
        if (computerImg == rockImg) {
        	document.getElementById("winner").innerHTML = "rock wins";
        	compScore++;
            document.getElementById("sc2").innerHTML = "" + compScore;
        } else {
            document.getElementById("winner").innerHTML = "scissors wins";
            youScore++;
            document.getElementById("sc1").innerHTML = "" + youScore;
        }
    }
}
