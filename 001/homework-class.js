
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

console.log(trolleybus);




















