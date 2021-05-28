let enemy;

function Enemy (enemyType, health, armor, strenght, agility, speed, xp) {
  this.enemyType = enemyType;
  this.health = health * xp;
  this.armor = armor * xp;
  this.strenght = strenght * xp;
  this.agility = agility * xp;
  this.speed = speed * xp;
  this.xp = xp;
}
