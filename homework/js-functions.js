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
  if (number <= 1) {
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
  console.log("// 6 Original Array:", random);
  
  const nonPrimeNumbers = random.filter(number2 => check2(number2) === 0);
  console.log("//6 Array after Removing Prime Numbers:", nonPrimeNumbers);
  */
  
  //7
  /*
  Generate an array of random length (between 10 and 20) with all but the last
  elements being random numbers between 0 and 10, and the last array which is 
  generated according to the same condition as the first array. Repeat everything 
  a random number of times from 10 to 30 times. The last element of the last
  array is 0;
  */
  
function generateRandomArray(length) {
  const array = Array.from({ length }, () => Math.floor(Math.random() * 11));
  return array;
}

function generateArrays() {
  const repeats = Math.floor(Math.random() * (30 - 10 + 1)) + 10;
  const arrays = [];
  for (let i = 0; i < repeats; i++) {
    const length = Math.floor(Math.random() * (20 - 10 + 1)) + 10;
    let array = generateRandomArray(length);
    if (i === repeats - 1) {
      array[length - 1] = 0;
    }
    arrays.push(array);
  }
  return arrays;
}

console.log('//7 Generate Arrays', generateArrays());

//8
/*
Calculate the sum of the elements from the 7 Task that are not arrays. 
Calculation is required on all arrays and subarrays
*/ 

function generateRandomArray(length, lastIndexValue) {
  const array = Array.from({ length }, () => Math.floor(Math.random() * (lastIndexValue ? 11 : 10)));
  if (lastIndexValue) {
    array[length - 1] = lastIndexValue;
  }
  return array;
}

function generateArrays() {
  const repeats = Math.floor(Math.random() * (30 - 10 + 1)) + 10;
  const arrays = [];
  for (let i = 0; i < repeats; i++) {
    const length = Math.floor(Math.random() * (20 - 10 + 1)) + 10;
    let array = generateRandomArray(length, i === repeats - 1 ? 0 : undefined);
    arrays.push(array);
  }
  return arrays;
}

const arrays = generateArrays();
const flatArray = arrays.flat(Infinity);
const sum = flatArray.reduce((accumulator, currentValue) => accumulator + (Array.isArray(currentValue) ? 0 : currentValue), 0);
console.log('//8 Sum of elements:', sum);
/*
function generateRandomArray(length, lastIndexValue) {
  const array = Array.from({ length }, () => Math.floor(Math.random() * (lastIndexValue ? 11 : 10)));
  if (lastIndexValue) {
    array[length - 1] = lastIndexValue;
  }
  return array;
}

function generateArrays() {
  const repeats = Math.floor(Math.random() * (30 - 10 + 1)) + 10;
  const arrays = [];
  for (let i = 0; i < repeats; i++) {
    const length = Math.floor(Math.random() * (20 - 10 + 1)) + 10;
    const lastIndexValue = i === repeats - 1 ? 0 : undefined;
    let array = generateRandomArray(length, lastIndexValue);
    arrays.push(array);
  }
  const flatArray = [].concat(...arrays);
  const sum = flatArray.reduce((accumulator, currentValue) => accumulator + (Array.isArray(currentValue) ? 0 : currentValue), 0);
  console.log(sum);
}

generateArrays();
*/

//9
/*
Generate an array of three elements, which are random numbers from 1 to 33. 
If there is even one non-prime number among the last three elements, add 
one more element to the array, a random number from 1 to 33. Recheck the 
initial condition and add more if necessary one element. Repeat until the 
condition requires an element to be added.
*/

function isPrime(number) {
  if (number <= 1) {
    return false;
  }
  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      return false;
    }
  }
  return true;
}

function generateRandomNumber() {
  return Math.floor(Math.random() * 33) + 1;
}

function generateArray() {
  const array = [];
  for (let i = 0; i < 3; i++) {
    array.push(generateRandomNumber());
  }
  return array;
}

function hasNonPrimeNumber(array) {
  return array.slice(-3).some((number) => !isPrime(number));
}

function addRandomNumber(array) {
  array.push(generateRandomNumber());
}

let newArray = generateArray();
while (hasNonPrimeNumber(newArray)) {
  addRandomNumber(newArray);
}

console.log('//9 Variable array of primers:', newArray);


//10
/*
Generate an array of 10 elements that are arrays of 10 elements that are 
random numbers from 1 to 100. If the average of prime numbers in such a
 large array (not individually smaller) is less than 70, find the smallest 
 number in the array (not necessarily prime) and add to it 3. Calculate 
 the average of the prime numbers of the array again and if it is less 
 than 70, repeat everything.
*/

function isPrime(number) {
  if (number <= 1) {
    return false;
  }
  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      return false;
    }
  }
  return true;
}

function generateRandomNumber() {
  return Math.floor(Math.random() * 100) + 1;
}

function generateInnerArray() {
  return Array.from({ length: 10 }, () => generateRandomNumber());
}

function generateArray() {
  return Array.from({ length: 10 }, () => generateInnerArray());
}

function calculateAverage(array) {
  const primeNumbers = array.flat().filter((number) => isPrime(number));
  const sum = primeNumbers.reduce((acc, val) => acc + val, 0);
  return primeNumbers.length === 0 ? 0 : sum / primeNumbers.length;
}

let currentArray = generateArray();
let avgPrime = calculateAverage(currentArray);

while (avgPrime < 70) {
  const smallestNumber = Math.min(...currentArray.flat());
  const index = currentArray.flat().indexOf(smallestNumber);
  currentArray[Math.floor(index / 10)][index % 10] += 3;
  
  console.log("//10 Current Array:", currentArray);
  
  avgPrime = calculateAverage(currentArray);
  console.log("//10 Average of Prime Numbers:", avgPrime);
}

console.log("//10 Final Array:", currentArray);

