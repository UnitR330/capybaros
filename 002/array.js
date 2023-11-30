console.log('Hello from array castle');

//console.log(document.querySelector('h1').innerHTML);

const colors = [
    'pink',
    'orange',
    'yellow',
    'pink',
    'blue',
    'indigo',
    'green',
    'pink'
];

const colors2 = [
    'pink',
    'orange',
    'yellow',
    'pink',
    'blue',
    'indigo',
    'green',
    'pink'
];

colors.forEach((color, index) =>{
    if (color == 'pink') {
        color[index] = 'grey';
    }
});

colors.forEach((color, index, array) => {
    if (color === 'pink') {
        colors2[index] = 'green';
    }
});

const updatedColors = colors.map(color => color === 'pink' ? 'black' : color);
const updatedColors2 = colors.map(color => color === 'pink' ? 'skyblue' : color);


console.log("Original Colors:", colors);
console.log("Updated Colors:", colors2);
console.log("Updated Colors1:", updatedColors);
console.log("Updated Colors2:", updatedColors2);

 colors22 = [
    {name: 'pink'},
    {name: 'orange'},
    {name: 'yellow'},
    {name: 'pink'},
    {name: 'blue'},
    {name: 'indigo'},
    {name: 'pink'},
 ];

 colors22.forEach(item => {
    if (item.name === 'pink') {
        item.name = 'black';
    }
});
console.log("Updated Colors22:", colors22);

const updatedColors22 = colors22.map(i => ({ name: i.name === 'pink' ? 'black' : i.name}));
console.log("Updated Colors23:", updatedColors22);

colors23 = [
    {name: 'pink'},
    {name: 'orange'},
    {name: 'yellow'},
    {name: 'pink'},
    {name: 'blue'},
    {name: 'indigo'},
    {name: 'pink'},
 ];

const colors33 = colors23.map(color => color.name == 'pink' ? {name: 'lightblue'} : color);
console.log('Updated colors33:', colors33);

const colors44 = [
    {name: 'pink', age: 12},
    {name: 'orange', age: 13},
    {name: 'yellow', age: 14},
    {name: 'pink', age: 15},
    {name: 'blue', age: 16},
    {name: 'indigo', age:17},
    {name: 'pink', age:18},
 ];

 
const updatedColors44 = colors44.map(item => ({ ...item, name: item.name === 'pink' ? 'black' : item.name
}));

console.log("Updated Colors44:", updatedColors44);

colors44.forEach(item => {
    if (item.name === 'pink') {
        item.name = 'lightgreen';
    }
});

console.log("Updated Colors45:", colors44);

const colors55 = [
    {name: 'pink', age: 12},
    {name: 'orange', age: 13},
    {name: 'yellow', age: 14},
    {name: 'pink', age: 15, tractor: 'John Deere'},
    {name: 'blue', age: 16},
    {name: 'indigo', age:17},
    {name: 'pink', age:18},
 ];

  
const updatedColors55 = colors44.map(color => color.name == 'pink' ? { ...color, name: 'black'} : {...'color'});

colors44[0].age = 100;
colors44[1].age = 200;

console.log(colors44);
console.log(colors55);

const colors57 = [
    { name: 'pink', age: 12 },
    { name: 'orange', age: 13 },
    { name: 'yellow', age: 14 },
    { name: 'pink', age: 15, tractor: 'John Deere' },
    { name: 'blue', age: 16 },
    { name: 'indigo', age: 17 },
    { name: 'pink', age: 18 }
];

const updatedColors57 = colors57.map(item => ({...item, name: 'white'}));

console.log("Original Colors:", colors57);
console.log("Updated Colors:", updatedColors57);

const cats = [
    {name: 'Tom', age: 12},
    {name: 'Pukis', age: 13},
    {name: 'Joudis', age: 14},
    {name: 'Margis', age: 15, tractor: 'John Deere'},
    {name: 'Ryzas', age: 16},
    {name: 'Pukis', age: 17},
    {name: 'Pukis', age: 18},
];



const catsWithoutPukis = cats.filter(cat => cat.name !== 'Pukis');

console.log("Original Cats:", cats);
console.log("Cats without Pukis:", catsWithoutPukis);


const catinas = [
    {name: 'Tom', age: 12},
    {name: 'Juodis', age: 13},
    {name: 'Juodis', age: 14},
    {name: 'Margis', age: 15, tractor: 'John Deere'},
    {name: 'Ryzas', age: 16},
    {name: 'Pukis', age: 17},
    {name: 'Juodis', age: 18},
];

const updatedCatinas = catinas
  .filter(catina => catina.name !== 'Juodis')
  .map(catina => ({ ...catina, age: catina.age + 1 }));

console.log("Original Catinas:", catinas);
console.log("Updated Catinas:", updatedCatinas);

 let counter = 0;
 const what = 4;
 const j = catinas.find(cat => catinas.name == 'Jodis' && ++counter == what)?.age;
 //const j = catinas.find(cat => catinas.name == 'Jodis' && ++counter == what);
/*const j = catinas.find(cati => {
   if (catinas.name == 'Juodis') {
    counter++;
   }
   return counter => what;
});*/
console.log(j);

let A;

console.log(A?.what);