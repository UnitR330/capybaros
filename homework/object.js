//1
/*
Create class Bucket1. In the constructor, create the property 
stoneQuantity, which is equal to 0. Write methods for adding 
stones to this class: add1Stone() addManyStones(amount) and 
the method that outputs the amount of stones to the console - 
amountSelectedStone(). Create a single bucket object and demonstrate 
collecting rocks into the bucket and outputting the results.
*/

class Bucket1 {
    constructor() {
      this.stoneQuantity = 0;
    }
  
    addOneStone() {
      this.stoneQuantity += 1;
    }
  
    addManyStones(amount) {
      this.stoneQuantity += amount;
    }
  
    amountSelectedStone() {
      console.log(`//1 Current amount of stones: ${this.stoneQuantity}`);
    }
  }
  
  const bucket = new Bucket1();
  bucket.addOneStone();
  bucket.addManyStones(3);
  bucket.amountSelectedStone();
  

//2


/*
Create a class Wallet. Two properties paperMoney and metalMoney are 
created in the constructor. Write a method add(amount) that adds money 
to the wallet. If the amount is less than 2, it is added to the metal 
Money, if not - to the paper Money. Write a count() method that would 
count and output to the console the amount of paper Money and metal Money. 
Create an object of the class and demonstrate the operation. It doesn't 
matter what paper bills and metal coins exist in the real world.
*/

class Wallet {
  constructor() {
    this.paperMoney = 0;
    this.metalMoney = 0;
  }

  add(amount) {
    if (amount < 2) {
      this.metalMoney += amount;
    } else {
      this.paperMoney += amount;
    }
  }

  count() {
    console.log('//2 Wallet Content:');
    console.log(`//2 Paper Money: ${this.paperMoney}`);
    console.log(`//2 Metal Money: ${this.metalMoney}`);
  }
}

// Example usage
const myWallet = new Wallet();

myWallet.add(1.5); // Added to metalMoney
myWallet.add(5);   // Added to paperMoney
myWallet.add(0.5); // Added to metalMoney

myWallet.count();




//3 
// Sukurti klasę Troleibusas. Konstruktoriuje sukurti savybę 
// keleiviuSkaicius kuri yra lygi 0. Parašyti du metodus: 
// ilipa(keleiviuSkaicius) ir islipa(keleiviuSkaicius). 
// O taip pat parašyti metoda vaziuoja(), kuris į konsolę išvestų 
// troleibusu važiuojančių keleivių skaičių. Atkreipkite dėmesį, 
// kad troleibusu važiuoti neigiamas keleivių skaičius negali.


class Troleybusas {
    constructor() {
        this.passengers = 0;
        this.onMove = true;
    }

    income(quantity) {
        this.passengers += quantity;
    }

    outcome(quantity) {
        this.passengers -= quantity;
    }

    inside() {
        if (this.passengers === 0) {
            this.onMove = false;
        } else {
            this.onMove = true;
        }
    }
}

const trolleybus = new Troleybusas();
trolleybus.income(10);
trolleybus.outcome(5);
trolleybus.outcome(5);
trolleybus.inside();

console.log('//3 Troley:', trolleybus);

 
 //4
 /*
 (STATIC) Create a method passengersTotalInTrolley(), which will show the 
 total number of passengers in object Trolley. To calculate the total 
 number of passengers, create a static method totalPassengerNumber(passengerNumber) 
 that adds or subtracts passengers from the static property allPassengers 
 (which contains the total number of passengers). Also modify the get(passengerNumber) 
 and get(passengerNumber) methods accordingly.
 */

 class Trolley {
  static allPassengers = 0;
  passengers = 0;

  constructor(passengers) {
    this.passengers = passengers;
    Trolley.totalPassengerNumber(passengers);
  }

  static totalPassengerNumber(passengerNumber) {
    Trolley.allPassengers += passengerNumber;
  }

  get passengersInTrolley() {
    return this.passengers;
  }

  set passengersInTrolley(newPassengers) {
    Trolley.totalPassengerNumber(newPassengers - this.passengers);
    this.passengers = newPassengers;
  }

  static passengersTotalInTrolley() {
    console.log(`//4 Total number of passengers in all trolleys: ${Trolley.allPassengers}`);
  }
}

// Example usage
const trolley1 = new Trolley(10);
const trolley2 = new Trolley(5);

Trolley.passengersTotalInTrolley(); // Output: Total number of passengers in all trolleys: 15

trolley1.passengersInTrolley = 8;
Trolley.passengersTotalInTrolley(); // Output: Total number of passengers in all trolleys: 13

 
 //5

 /*
(MAP) Create a class Shopping Cart. Create a property in the constructor 
that is a Map object. Create three methods: putCheese(amount), 
putMilk(amount), putBread(amount). Write a method cartContent() that 
would output a list of products to the console (the content variable). 
You can add the same products several times, in which case the amount of 
products should add up.
 */
 
class ShoppingCart {
  constructor() {
    this.content = new Map();
  }

  putCheese(amount) {
    this.addToCart('Cheese', amount);
  }

  putMilk(amount) {
    this.addToCart('Milk', amount);
  }

  putBread(amount) {
    this.addToCart('Bread', amount);
  }

  addToCart(product, amount) {
    if (this.content.has(product)) {
      this.content.set(product, this.content.get(product) + amount);
    } else {
      this.content.set(product, amount);
    }
  }

  cartContent() {
    console.log('//5 Cart Content:');
    this.content.forEach((amount, product) => {
      console.log(`${product}: ${amount}`);
    });
  }
}

// Example usage
const cart = new ShoppingCart();

cart.putCheese(2);
cart.putMilk(1);
cart.putBread(3);
cart.putCheese(1);

cart.cartContent();

 //6

 /*

 */
 
 















