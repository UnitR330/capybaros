console.log('Homework task 1');

class Bucket1 {
    constructor() {
        this.stoneQuantity = 0;
    }
    addStone()  {
        this.stoneQuantity++;
    }
    addManyStones(quantity)  {
        this.stoneQuantity += quantity;
    }
    howManyStones() {
        console.log('Stones total:', this.stoneQuantity);
    }
}

const bucket1 = new Bucket1();
const bucket2 = new Bucket1();
const bucket3 = new Bucket1();

bucket1.addStone();
bucket1.addStone();
bucket1.addStone();
bucket1.addManyStones(10);

bucket2.addStone();
bucket2.addStone();

bucket3.addStone(100);

bucket1.howManyStones();
bucket2.howManyStones();
bucket3.howManyStones();

