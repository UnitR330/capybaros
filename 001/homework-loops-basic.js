
//1
let a = Math.floor(Math.random() * 21) + 5; // Random number between 5 and 25
let b = Math.floor(Math.random() * 21) + 5; // Random number between 5 and 25
let c = Math.floor(Math.random() * 21) + 5; // Random number between 5 and 25

//1a

const sum = (a + b + c); 
console.log('1B Print sum:', sum);
//1b

const x =`${a}${b}${c}`;
console.log('1B Print string:', x);
//1c

const y = `${a} ${b} ${c}`;
console.log("1C String with Spaces:", y);
//1d
const z = `${a} ${b} ${c} ${sum}`;
console.log("1D String with Spaces:", z);

//2

let yep = Math.floor(Math.random() * 5) + 5;  
console.log('2 Random:', yep);

//2*
function rand10(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  const lop = rand10(5, 10);
  console.log("2* Random Number:", lop);
  
//3
const text = "Labas";

for (let i = 0; i < 5; i++) {
    console.log('3 Greetings', text);
}

//4 

for (let i = 0; i < 5; i++) {
  console.log('4 Printing results 5 times from 2 task:', lop);
}
//5

for (let c = 0; c < lop; c++) {
  console.log("5 Random number = printing times:", lop);
}

//6 

if (lop > 7) {
  console.log("6 Prints only if rand10 number >7:", lop);
}
//7

let resultNumber;
function rand7(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
for (let i = 0; i < 5; i++) {
   const random = rand7(10, 20);
   resultNumber = random;
  }
  
  //7A
  
  console.log("7A Generated Number:", resultNumber);

//7B
let sum2 = 0;
for (let i = 0; i < 5; i++) {
  const random = rand7(10, 20);
  resultNumber = random;
  console.log("7B Generated Number:", resultNumber);
  sum2 += random;
};

console.log("7B Sum of generated numbers:", sum2);

//7C
let numbersInString = "";
for (let i = 0; i < 5; i++) {
  const random = rand7(10, 20);
  numbersInString += random + " ";
};
console.log("7C Generated Numbers String:", numbersInString);

//7D

let sum3 = 0;
let str = "";

for (let i = 0; i < 5; i++) {
    const random2 = rand7(10, 20);
    sum3 += random2;
    str += random2 + " ";
}
str += sum3;

console.log("7D Generated Numbers String with Sum:", str.trim());

//8

function rand8(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
//8ABCDE

let totalRepeat = 0;

do {
  let iterations = 0;
  let sum4 = 0;
  let reject = 0; 
  let evenCount = 0;
  let oddCount = 0;
  
  let g;
  do {
  g = rand8(10, 25);
  iterations++;
    if (g <= 18) {
     sum4 += g;
      if (g % 2 === 0) {
        evenCount++;
      } else {
       oddCount++;
      }
    } else {
    reject++;
    }
  } while (g >= 12);
console.log("8A Generated Number:", g);
console.log("8B Iterations:", iterations);
console.log("8C Calculate sum:", sum4);
console.log("8D Rejected numbers count:", reject);
console.log("8E Even numbers:", evenCount, "Odd numbers:", oddCount);
console.log('----------------------');

totalRepeat++;
} while (totalRepeat <= 2);

console.log("8F Total Repetitions:", totalRepeat);

//9
 
function rand9(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

let attemptsInner = 0;
let attemptsOuter = 0;
let fiveCount = 0;

while (fiveCount < 3) {
  let n = rand9(5, 10);
  attemptsOuter++;

  if (n === 5 ) {
    fiveCount++;
  }
  for (let i = 0; i < n; i++ ) {
    attemptsInner++;
  }
} 

console.log("9 Number of OuterAttepmtps:", attemptsOuter);
console.log("9A Number of innerAttempts:", attemptsInner);
console.log("9B fiveCount:", fiveCount);    

//9C

function rand10(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

let outerIterations = 0;
let innerIterations = 0;
let consecutiveFiveCount = 0;

while (consecutiveFiveCount < 9) {
  let generatedNumber = rand10(5, 10);
  outerIterations++;

  if (generatedNumber === 5) {
      consecutiveFiveCount++;
    } else {
      consecutiveFiveCount = 0;
    }
    
    for (let i = 0; i < generatedNumber; i++) {
      innerIterations++;
    }
  }
  
  console.log("9C Attepts to catch 9 in a row 3 times:", outerIterations);
  console.log("9C Number of Inner Iterations:", innerIterations);
  
  //10 
  
  /*
  function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  // Function to play the Bingo game
  function playBingo(playerName, minPoints, maxPoints) {
    let totalPoints = 0;
    let rounds = 0;
    
    while (totalPoints < 222) {
      let points = rand(minPoints, maxPoints);
      totalPoints += points;
      rounds++;
      
      // console.log(`${playerName} scored ${points} points. Total: ${totalPoints}`);
    }
    
    console.log(`${playerName} is the winner with ${totalPoints} points in ${rounds} rounds!`);
    return { playerName, totalPoints, rounds };
  }
  const player1Result = playBingo("Player 1", 10, 20);
  
  const player2Result = playBingo("Player 2", 5, 25);
  
  if (player1Result.totalPoints > player2Result.totalPoints) {
    console.log(`Overall Winner: ${player1Result.playerName} with ${player1Result.totalPoints} points in ${player1Result.rounds} rounds!`);
  } else {
    console.log(`Overall Winner: ${player2Result.playerName} with ${player2Result.totalPoints} points in ${player2Result.rounds} rounds!`);
  }
  
  //10*
  
  function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  // Function to simulate the Bingo game
  function playBingo(playerName, minRange, maxRange, targetScore) {
    let points = 0;
    let attempts = 0;
    
    while (points < targetScore) {
      let generatedPoints = rand(minRange, maxRange);
      points += generatedPoints;
      attempts++;
    }
    
    console.log(`${playerName} won with ${points} points in ${attempts} attempts.`);
    return { playerName, points, attempts };
  }
  
  // Set the target score for winning
  const targetScore = 222;
  
  // Play the Bingo game for Player 1
  const player1Result = playBingo("Player 1", 10, 20, targetScore);
  
  // Play the Bingo game for Player 2
  const player2Result = playBingo("Player 2", 5, 25, targetScore);
  
  // Determine the winner based on the number of attempts
  const winner = player1Result.attempts < player2Result.attempts ? player1Result : player2Result;
  
  // Print the winner to the console
  console.log(`The winner is ${winner.playerName} with ${winner.points} points in ${winner.attempts} attempts.`);
  */

  //10**

  // Your random number generation function
function rand(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Function to simulate the Bingo game
function playBingo(playerName, minRange, maxRange, targetScore) {
  let points = 0;
  let attempts = 0;

  while (points < targetScore) {
      let generatedPoints = rand(minRange, maxRange);
      points += generatedPoints;
      attempts++;
  }

  console.log(`${playerName} won with ${points} points in ${attempts} attempts.`);
  return { playerName, points, attempts };
}

const targetScore = 222;

const player1Result = playBingo("Player 1", 10, 20, targetScore);

const player2Result = playBingo("Player 2", 5, 25, targetScore);

// Check if players have the same points and attempts
if (player1Result.points === player2Result.points && player1Result.attempts === player2Result.attempts) {
  console.log("Both players have the same points and attempts. Starting an additional round.");

  // Play an additional round
  const additionalRoundPlayer1Result = playBingo("Player 1", 10, 20, targetScore);
  const additionalRoundPlayer2Result = playBingo("Player 2", 5, 25, targetScore);

  // Determine the winner of the additional round
  const additionalRoundWinner = additionalRoundPlayer1Result.attempts < additionalRoundPlayer2Result.attempts
      ? additionalRoundPlayer1Result
      : additionalRoundPlayer2Result;

  // Print the additional round winner to the console
  console.log(`The winner of the additional round is ${additionalRoundWinner.playerName} with ${additionalRoundWinner.points} points in ${additionalRoundWinner.attempts} attempts.`);
} else {
  // Determine the winner based on the number of attempts
  const winner = player1Result.attempts < player2Result.attempts ? player1Result : player2Result;

  // Print the winner to the console
  console.log(`The winner is ${winner.playerName} with ${winner.points} points in ${winner.attempts} attempts.`);
}

  