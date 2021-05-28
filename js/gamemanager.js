let e = 0;
let p = 0;

let GameManager = {
  setGameStart: function(classType){
    let getLogout = document.querySelector(".logout");
    getLogout.innerHTML = '';
    this.resetPlayer(classType);
    this.setPreFight();
  },
  resetPlayer: function(classType){
    switch(classType){
      case "Harcos":
        player = new Player(classType, 200, 100, 200, 100, 50, 1 + p);
        break;
      case "Druida":
        player = new Player(classType, 200, 150, 50, 200, 100, 1 + p);
        break;
      case "Vadász":
        player = new Player(classType, 100, 50, 100, 150, 200, 1 + p);
        break;
    }
    let getInterface = document.querySelector(".interface");
    getInterface.innerHTML = '<img src="img/avatar-player/' + classType.toLowerCase() + '.jpg" class="img-avatar"><div><h3>' + classType + '</h3><p class="health-player">Életerő: ' + player.health + '</p><p>Támadás: ' + player.strenght + '</p><p>Páncél: ' + player.armor + '</p><p>Ügyesség: ' + player.agility + '</p><p>Sebesség: ' + player.speed + '</p><p>Szint: ' + player.xp + '</p><p class="player-outcome"></p><p class="player-result"></p><div>';
  },
  setPreFight: function(){
    let getHeader = document.querySelector(".header");
    let getActions = document.querySelector(".actions");
    let getArena = document.querySelector(".arena");
    getHeader.innerHTML = '<p>Készen állsz?</p>';
    getActions.innerHTML = '<a href="#" class="btn-prefight" onclick="GameManager.setFight()">Ellenfél keresése</a>';
    getArena.style.visibility = "visible";
  },
  setFight: function(){
    let getInterface = document.querySelector(".interface");
    let getHeader = document.querySelector(".header");
    let getActions = document.querySelector(".actions");
    let getEnemy = document.querySelector(".enemy");
    let enemy00 = new Enemy("Kalóz", 200, 100, 150, 80, 150, 1 + e);
    let enemy01 = new Enemy("Bandita", 100, 50, 50, 100, 100, 1 + e);
    let enemy02 = new Enemy("Kapitány", 500, 200, 200, 140, 180, 1 + e);
    let ChooseRandomEnemy = Math.floor(Math.random()*Math.floor(2));
    switch(ChooseRandomEnemy){
      case 0:
        enemy = enemy00;
        break;
      case 1:
        enemy = enemy01;
        break;
    }
    if(player.xp > 5){
      enemy = enemy02;
    }
    getHeader.innerHTML = '';
    getInterface.innerHTML = '<img src="img/avatar-player/' + player.classType.toLowerCase() + '.jpg" class="img-avatar"><div><h3>' + player.classType + '</h3><p class="health-player">Életerő: ' + player.health + '</p><p>Támadás: ' + player.strenght + '</p><p>Páncél: ' + player.armor + '</p><p>Ügyesség: ' + player.agility + '</p><p>Sebesség: ' + player.speed + '</p><p>Szint: ' + player.xp + '</p><p class="player-outcome"></p><p class="player-result"></p><div>';
    getActions.innerHTML = '<a href="#" class="btn-prefight" onclick="PlayerMoves.calcAttack1()">Átlagos támadás!</a>';
    getActions.innerHTML += '<a href="#" class="btn-prefight" onclick="PlayerMoves.calcAttack2()">Egyszeri nagy bökés!</a>';
    getActions.innerHTML += '<a href="#" class="btn-prefight" onclick="PlayerMoves.calcAttack3()">Rengeteg szúrás!</a>';
    getEnemy.innerHTML = '<img src="img/avatar-enemies/' + enemy.enemyType.toLowerCase() + '.jpg" alt="' + enemy.enemyType + '" class="img-avatar"><div><h3>' + enemy.enemyType + '</h3><p class="health-enemy">Életerő: ' + enemy.health + '</p><p>Támadás: ' + enemy.strenght + '</p><p>Páncél: ' + enemy.armor + '</p><p>Ügyesség: ' + enemy.agility + '</p><p>Sebesség: ' + enemy.speed + '</p><p>Szint: ' + enemy.xp + '</p><p class="enemy-outcome"></p><p class="enemy-result"></p><div>';

  },
  setRiddle: function() {
    let getHeader = document.querySelector(".header");
    let getActions = document.querySelector(".actions");
    let getEnemy = document.querySelector(".enemy");
    let getInterface = document.querySelector(".interface");
    let getArena = document.querySelector(".arena");
    let riddle00 = new Riddle("2+2?", 4, 3, 5);
    let riddle01 = new Riddle("4-2?", 2, 1, 3);
    let chooseRandomRiddle = Math.floor(Math.random() * Math.floor(2));
    let IsThereRiddle = Math.floor(Math.random() * 10);
    switch(chooseRandomRiddle){
      case 0:
        riddle = riddle00;
        break;
      case 1:
        riddle = riddle01;
        break;
    }
    if(IsThereRiddle < 6){
      getHeader.innerHTML = riddle.question;
      getInterface.innerHTML= '<p>' + '<input type="number" name="answer" id="answer" value= "0" placeholder="Válasz">' + '</p>' + '<p>' + '<button type="button" onclick="RiddleFunctions.checkRiddle()"> Check </button>' +  '</p>';
    }
    else{
      getHeader.innerHTML = '';
      getInterface.innerHTML='<a href="#" class="btn-prefight" onclick="GameManager.setFight()" >Úgy látszik a koboldok lelopták a lakatot az ajtóról, haladj át!</a>';
    }
    getActions.innerHTML = '';
    getEnemy.innerHTML= '';
    getArena.innerHTML= '';
  }
}
