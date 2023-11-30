/*

// Task 1: Generate an array of 30 elements with random numbers from 5 to 25
const array = [];
for (let i = 0; i < 30; i++) {
    array[i] = Math.floor(Math.random() * 21) + 5;
}
console.log('array', array);

//2a
function countGreaterElements(arr) {
    let count = 0;
    for (let i = 0; i < arr.length; i++) {
        if (arr[i] > 10) {
            count++;
        }
    }
    console.log(`Numbers > 10: ${count}`);
}
countGreaterElements(array);

//2b
function findMaxAndIndex(arr) {
    let max = arr[0];
    let maxIndex = 0;

    for (let i = 1; i < arr.length; i++) {
        if (arr[i] > max) {
            max = arr[i];
            maxIndex = i;
        }
    }
    return { max, maxIndex };
}
const { max, maxIndex } = findMaxAndIndex(array);
console.log(`Bigger0 value and it's index in the array: ${max}: ${maxIndex} `);
//2c

let sumOfEvenIndexedValues = 0;
for (let i = 0; i < array.length; i += 2) {
  // Check if the index is even
  if (i % 2 === 0) {
    sumOfEvenIndexedValues += array[i];
  }
}
console.log('Sum of even indexed values:', sumOfEvenIndexedValues);

//2d

const array2 = array.map((value, index) => value - index);
console.log('array2', array2);

//2e

for (let i = 30; i < 40; i++) {
    array[i] = Math.floor(Math.random() * 21) + 5; 
    array2[i] = Math.floor(Math.random() * 21) + 5;
}
console.log('Extended array', array);
console.log('Extended array2', array2);

//2f

const oddIndexArray = array.filter((value, index) => index % 2 !== 0);
const evenIndexArray = array.filter((value, index) => index % 2 === 0);

console.log('Array with odd index values', oddIndexArray);
console.log('Array with even index values', evenIndexArray);

//2g
for (let i = 0; i < array.length; i += 2) {
    if (i % 2 === 0 && array[i] > 15) {
        array[i] = 0;
    }
}

console.log('Modified array', array);

//2h

let firstIndexGreaterThan10 = -1;

for (let i = 0; i < array.length; i++) {
    if (array[i] > 10) {
        firstIndexGreaterThan10 = i;
        break;  
    }
}

console.log('First index element > 10:', firstIndexGreaterThan10);

//3

function generateRandomLetter() {
    const letters = ['A', 'B', 'C', 'D'];
    const randomIndex = Math.floor(Math.random() * letters.length);
    return letters[randomIndex];
}
const array3 = Array.from({ length: 200 }, generateRandomLetter);
console.log('Generated array', array3);

const letterCount = array3.reduce((acc, letter) => {
    acc[letter] = (acc[letter] || 0) + 1;
    return acc;
}, {});
console.log('Letter count', letterCount);

//4

// Function to generate a random letter (A, B, C, D)
function generateRandomLetter() {
    const letters = ['A', 'B', 'C', 'D'];
    const randomIndex = Math.floor(Math.random() * letters.length);
    return letters[randomIndex];
}

const array4 = Array.from({ length: 200 }, generateRandomLetter);
const array5 = Array.from({ length: 200 }, generateRandomLetter);
const array6 = Array.from({ length: 200 }, generateRandomLetter);
console.log('Array 1', array4);
console.log('Array 2', array5);
console.log('Array 3', array6);

const sumArray = array4.map((letter, index) => letter + array5[index] + array6[index]);
console.log('Sum Array', sumArray);

const uniqueValues = new Set(sumArray);
const uniqueValuesCount = uniqueValues.size;

const uniqueCombinations = new Set(sumArray.join(''));
const uniqueCombinationsCount = uniqueCombinations.size;
console.log(`Number of unique individual values: ${uniqueValuesCount}`);
console.log(`Number of unique combinations: ${uniqueCombinationsCount}`);

//5

function generateUniqueRandomNumber(min, max, usedNumbers) {
    let num;
    do {
        num = Math.floor(Math.random() * (max - min + 1)) + min;
    } while (usedNumbers.includes(num));
    return num;
}

function generateUniqueRandomArray(length, min, max) {
    const uniqueArray = [];
    for (let i = 0; i < length; i++) {
        const num = generateUniqueRandomNumber(min, max, uniqueArray);
        uniqueArray.push(num);
    }
    return uniqueArray;
}

const array7 = generateUniqueRandomArray(100, 100, 999);
const array8 = generateUniqueRandomArray(100, 100, 999);

console.log('Array 1', array7);
console.log('Array 2', array8);

//6

const array9 = array7.filter(value => !array8.includes(value));
console.log('Array 3 (values from Array 1 not in Array 2)', array9);

//7
const array10 = array7.filter(value => array8.includes(value));
console.log('Array 3 (values from Array 1 that exist in Array 2)', array10);
*/
//8

function generateUniqueArray(length) {
    const uniqueArray = [];
    while (uniqueArray.length < length) {
      const randomNumber = Math.floor(Math.random() * 900) + 100; // Generate random number between 100 and 999
      if (!uniqueArray.includes(randomNumber)) {
        uniqueArray.push(randomNumber);
      }
    }
    return uniqueArray;
  }
  
  const firstArray = generateUniqueArray(100);
  const secondArray = generateUniqueArray(100);
  
  console.log("First Array:", firstArray);
  console.log("Second Array:", secondArray);


  const thirdArray = [];
for (let i = 0; i < firstArray.length; i++) {
  const index = firstArray[i];
  const value = secondArray[i];
  thirdArray[index] = value;
}

console.log("Third Array:", thirdArray);

//9
function generateArray() {
    const array = [];
    let num1 = Math.floor(Math.random() * 21) + 5; 
    let num2 = Math.floor(Math.random() * 21) + 5; 
  
    array.push(num1, num2);
      
    for (let i = 2; i < 10; i++) {
       const sum = array[i - 1] + array[i - 2];
       array.push(sum);
    }
      
    return array;
    }
      
    const resultArray = generateArray();
    console.log("Generated Array:", resultArray);
       
 
 
 
 
 
 
 
 
 
 
 
 
 
/*

function generateUniqueRandomNumber(min, max, usedNumbers) {
    let num;
    do {
        num = Math.floor(Math.random() * (max - min + 1)) + min;
    } while (usedNumbers.includes(num));
    return num;
}

function generateUniqueRandomArray(length, min, max) {
    const uniqueArray = [];
    while (uniqueArray.length < length) {
        const num = generateUniqueRandomNumber(min, max, uniqueArray);
        uniqueArray.push(num);
    }
    return uniqueArray;
}

let array1 = generateUniqueRandomArray(100, 100, 999);
 array2 = generateUniqueRandomArray(100, 100, 999);

console.log('Array 1', array1);
console.log('Array 2', array2);

let array3 = array1.map(index => array2[index]);
console.log('Array 3 (indexes from Array 1, values from Array 2)', array3);


//8*

// Function to generate a random value within a specified range
function generateRandomValue(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  // Function to create an array of random values
  function createRandomArray(length, min, max) {
    const randomArray = [];
    for (let i = 0; i < length; i++) {
      randomArray.push(generateRandomValue(min, max));
    }
    return randomArray;
  }
  
  // Create two arrays with random values
  const array4 = createRandomArray(100, 100, 999);
  const array5 = createRandomArray(100, 100, 999);
  
  // Function to create an array using indexes from the first array and values from the second array
  function createThirdArray(indexArray, valueArray) {
    return indexArray.map(index => valueArray[index]);
  }
  
  // Create an array of indexes from the first array
  const array3Indexes = Array.from({ length: array4.length }, (_, index) => index);
  
  // Create the third array using indexes from the first array and values from the second array
  const array6 = createThirdArray(array3Indexes, array5);
  
  // Log the arrays to the console
  console.log("Array 4:", array4);
  console.log("Array 5:", array5);
  console.log("Array 6 (Values from Array 2 using Indexes from Array 1):", array6);
  

/*




// Task 3: Find the maximum value in the array and its index
const maxIndex = myArray.indexOf(Math.max(...myArray));
const maxValue = myArray[maxIndex];

// Task 4: Calculate the sum of all even-indexed (even) values
const sumOfEvenIndexedValues = myArray.filter((value, index) => index % 2 === 0).reduce((sum, value) => sum + value, 0);

// Logging the results
console.log('Generated Array:', myArray);
console.log('Values greater than 10:', valuesGreaterThan10);
console.log('Maximum value and its index:', maxValue, 'at index', maxIndex);
console.log('Sum of even-indexed values:', sumOfEvenIndexedValues);
const myArray = Array.from({ length: 30 }, () => Math.floor(Math.random() * 21) + 5);
console.log('myArray', myArray);

1*
const myArray1 = [...Array(30).keys()];
console.log('myArray1', myArray1);
1*
let arr = new Array(30);
for (let i = 0; i < 30; i++) {
    arr[i] = i;
    console.log('arr', arr);
}
const array = [];

*/
