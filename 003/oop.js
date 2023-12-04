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

const box = {};

