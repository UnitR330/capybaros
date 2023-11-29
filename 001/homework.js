
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
        break; // Break the loop once the first index is found
    }
}

console.log('First index element > 10:', firstIndexGreaterThan10);

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
