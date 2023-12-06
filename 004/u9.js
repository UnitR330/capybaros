console.log('Homework task 9');

class Mushroom {
    constructor() {
        this.weight = this.rand(5, 45);
        this.eatable = !this.rand(0, 1);
        this.wormy = !this.rand(0, 1);
    }
    
    rand(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
}

    class Basket {
        constructor() {
            this.capacity = 500;
            this.loaded = 0;
    }

    add(mushroom) {
        if (!mushroom.wormy && mushroom.eatable) {
            this.loaded += mushroom.weight;
        }
    return this.capacity >= this.loaded;
}

}
const basket = new Basket();
while (basket.add(new Mushroom())) {
    console.log(basket);

}

console.log(basket);

