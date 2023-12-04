console.log('This is Object Oriented Programming');

class Movie {

    constructor(title) {
        this.title = title;
        console.log('Movie constructor');
    }

    show() {
        console.log('Show movie' + this.title);
    }

}

const terminator = new Movie('Terminator');
const matrix = new Movie('Matrix')

const terminatorWhat = {};


const arr1 = []; //short hand for new Array();
const arr2 = new Array();

const array1 = [];
const array2 = {}; 

terminator.show();
matrix.show();

console.log(terminator, matrix);

class Box {
    constructor() {
        this.item = ''
    }
    put(what) {
        this.item = what;
    }
    emptyBox() {
        this.item = '';
    }
};

const box1 = new Box();
const box2 = new Box();


box1.put('pen');
box2.put('pencil');
box1.put('eraser');

box1.emptyBox();

console.log(box1, box2);

// 2

class RandomDigit {
    constructor() {
      this.generateRandomDigit();
    }
  
    generateRandomDigit() {
      this.digit = Math.floor(Math.random() * 10);
    }
  }
  
  const randomDigitInstance = new RandomDigit();
  console.log("Random Digit:", randomDigitInstance.digit);
//2*
class RandomNumber {
    constructor() {
        this.digit = this.rand(0, 9);
    }
    rand(min, max) {
    min = Math.ceil(min);
    max = Math.ceil(max);
    return Math.floor(Math.random() * (max - min + 1) +1);
}
}

const digit1 = new RandomDigit();
const digit2 = new RandomDigit();

console.log(digit1, digit2);
//3 
class RandomDigit2 {
    constructor() {
      this.generateRandom();
    }
  
    generateRandom() {
      this.digit = Math.floor(Math.random() * 10);
    }
  }
  
  const randomDigitArray = Array.from({ length: 10 }, () => new RandomDigit());
  
  console.log("Generated Numbers:");
  randomDigitArray.forEach((randomDigit, index) => {
    console.log(`Digit ${index + 1}: ${randomDigit.digit}`);
  });
  

  //3*

  const arr = new Array(10)
  .fill(null)
  .map(_ => new RandomDigit())
  .map(el => console.log(el.digit) || el.digit);

  console.log(arr);

  //3 **
/*
  const _ = require('lodash');
  const length = 10;
  const min = 0;
  const max = 10;
  const numbers = [...Array(length)]; 
  for (let i = 0; i < numbers.length; i += 1) {    
    numbers[i] = _.random(min, max);   }

    console.log(numbers); 
    */
