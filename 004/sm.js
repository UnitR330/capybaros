
console.log('Welcome to Sets and Maps');


function rand(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}
const array = [];

array.push(10);
array.push(10);
array.push(10);
array.push(7);

console.log(array);


const set = new Set();

set.add(10);
set.add(10);
set.add(11);
set.add(114);
set.add(110);
set.add(1144);
set.add(101);
set.add(7);
set.add({a:1});
set.add({a:1});
set.add([1, 2, 3]);


set.delete(7);

console.log(set);
console.log(set.has(10), set.size);
console.log(set.has(101));

// iterate over a set
for (const item of set) {
    console.log(item);
}

set.forEach(item => console.log(item));


// convert set in array
const setArray = [...set];
console.log(setArray);

// sort array
setArray.sort((a, b) => a - b);
console.log(setArray);

set.clear();

setArray.forEach(item => set.add(item));
console.log(set);

randSet = new Set();
while (randSet.size < 10) {
    randSet.add(rand(0, 11));
}
console.log(randSet);

console.log('-----------------');
const map = new Map();

map.set('Petras', 40);
map.set('Jonas', 39);
map.set('Antanas', 41);
map.set('Petras', 42); // overwrites the previous value (means 40 => 42)
map.set({a:1}, 42); // objectas as a key
map.set('Petras', 42);
map.set([1, 2, 3], 42); // array as a key
map.set([1, 2, 3], 48); // array as a key
map.set(1, 42); // number as a key
map.set(2, 48); // number as a key
map.set(3, 48); // number as a key
map.set(function(){return 8}, 42); //function as a key

// iterate 
for (const item of map) {
    console.log(item);
}

// for each
map.forEach((value, key) => console.log(key, value)); // key = 'Petras', 'Jonas', 'Antanas'; value = 40, 39, 41, 42...

console.log(map);

const fancyMap = new Map;

fancyMap.set(function(a) {return a + 1 }, 42);
fancyMap.set(function(a) {return a / 17 }, 22);
fancyMap.set(function(a) {return a * 77 }, 13);

// fancyMap.forEach((value, key) => console.log(key(10), value));

for (const item of fancyMap) {
    console.log(item[0](item[1]));
}

// convert map to array
const mapArray = [...fancyMap];
console.log(mapArray);

// array for map

const a = [1, 2, 3];

const mapArray2 = [
['Petras', 40],
['Jonas', 39],
['Antanas', 41],
['Petras', 42],
[{a:1}, 42],
[[1, 2, 3], 42],
[a, 48],
[1, 42],
[function(){return 8}, 48],
];
const map2 = new Map(mapArray2);
console.log(map2);

map2.delete('Petras');
map2.delete(a);
/*
// map.delete([1, 2, 3]); 
this function did not works. It can not delete [1, 2, 3] from results. If you really wants to delete [1, 2, 3]
from results, you shall add "const a = [1, 2, 3]" and change "[1, 2, 3]" to "a" in array.  
*/
console.log(map2);
console.log('---------------------');

console.log(map2.get('Jonas'));
console.log(map2.has('Jonas555'));
console.log(map2.has('Jonas'));
console.log(map2.size);