const logo = document.querySelector('.logo');
let rotationAngle = 0;
let rotationDirection = 1; 

function rotateLogo() {
    rotationAngle += 1 * rotationDirection; 
    logo.style.transform = `rotate(${rotationAngle}deg)`;
    if (rotationAngle >= 45 || rotationAngle <= -45) {
        rotationDirection *= -1; 
    }
}

setInterval(rotateLogo, 100); 

