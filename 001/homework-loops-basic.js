
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

// Declare variables outside the loop
let outerIterations = 0;
let innerIterations = 0;
let consecutiveFiveCount = 0;

// Repeat the loop until the number 5 is generated three times in a row
while (consecutiveFiveCount < 3) {
  // Generate random numbers from the range 5 to 10 inside the loop
  let generatedNumber = rand10(5, 10);

  // Count the number of outer iterations
  outerIterations++;

  // Check if the generated number is 5
  if (generatedNumber === 5) {
      // Increment the count of consecutive fives
      consecutiveFiveCount++;
  } else {
      // Reset consecutive fives count if the generated number is not 5
      consecutiveFiveCount = 0;
  }

  // Run another loop inside the main loop
  for (let i = 0; i < generatedNumber; i++) {
      // Count the number of inner iterations
      innerIterations++;
  }
}

// Print the number of outer and inner iterations outside the loop
console.log("Number of Outer Iterations:", outerIterations);
console.log("Number of Inner Iterations:", innerIterations);

