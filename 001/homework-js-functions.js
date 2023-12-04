//1

function print(text) {
    console.log(text);
}
print("Hello!");

//2

function print2(text2, count) {
    for (let i = 0; i < count; i++) {
      console.log(text2);
    }
  }
  print2("Print me!", 3);

  //4

  function check(number) {
   if(number <= 1 ) {
        return 0;
    }
 
    let count = 0;
  
    for (let i = 2; i <= Math.sqrt(number); i++) {
      if (number % i === 0) {
        count++;
        if (i !== number / i) {
          count++;
        }
      }
    }
  
    return count;
  }
  
  const numberToCheck = 100
  const divisorsCount = check(numberToCheck);
  console.log(`//4 The number ${numberToCheck} has ${divisorsCount} divisors.`);
  
  //5 Generate an array of 100 elements. Whose values are random numbers 
  // from 33 to 77. Sort the array by the number of divisors without a 
  // remainder in descending order. For sorting  use function that counts 
  // how many whole numbers its argument is divisible by without a remainder 
  // (except for one and itself).

function generateRandomValue(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function countDivisors(value) {
  let count = 0;
  for (let i = 2; i <= value; i++) {
    if (value % i === 0) {
      count++;
    }
  }
  return count;
}

function showDivisorsCount(array) {
  array.forEach((number, index) => {
    console.log(`//5 Number ${index + 1}: ${number}, Divisors Count: ${countDivisors(number)}`);
  });
}

const randomNumbers = Array.from({ length: 100 }, () => generateRandomValue(33, 77));

const sortedNumbers = randomNumbers.sort((a, b) => countDivisors(b) - countDivisors(a));

console.log("//5 Original Array:", randomNumbers);
console.log("//5 Sorted Array by Number of Divisors:", sortedNumbers);
showDivisorsCount(sortedNumbers);

//6 
/*
Generate an array of 100 elements whose values are random numbers from 333 to 777. 
Use function: function to determine and delete the prime numbers from the array.
*/

function generateRandomValue(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;

function check2(number2) {
  if (number2 <= 1) {
    return 0;
  }
  let count = 0;
  for (let i = 2; i <= Math.sqrt(number2); i++) {
    if (number2 % i === 0) {
      count++;
      if (i !== number2 / i) {
        count++;
      }
    }
  }
  return count;
}

const random = Array.from({ length: 100 }, () => generateRandomValue(333, 777));

console.log("Original Array:", random);

const nonPrimeNumbers = random.filter(number2 => check2(number2) === 0);

console.log("Array after Removing Prime Numbers:", nonPrimeNumbers);

//7




 
 
 
 
 





































 
  
  
  
  
  
  
  
    
  
    
  
  
  
    