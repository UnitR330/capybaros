
//1
let a = Math.floor(Math.random() * 21) + 5; // Random number between 5 and 25
let b = Math.floor(Math.random() * 21) + 5; // Random number between 5 and 25
let c = Math.floor(Math.random() * 21) + 5; // Random number between 5 and 25

//1a

const sum = (a + b + c); 
console.log(sum);
//1b

const x =`${a}${b}${c}`;
console.log('Print string:', x);
//1c

const y = `${a} ${b} ${c}`;
console.log("String with Spaces:", y);
//1d
const z = `${a} ${b} ${c} ${sum}`;
console.log("String with Spaces:", z);

//2

let yep = Math.floor(Math.random() * 5) + 5; // Random number between 5 and 25
console.log('Random:', yep);

//2*
function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  const lop = rand(5, 10);
  console.log("Random Number:", lop);
  