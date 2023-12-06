console.log('Homework task 8');


class Glass {
    constructor(filled)  {
        this.filled = filled;
        this.quantity = 0;
    }
    pour(quantity) {
        this.quantity = Math.min(this.filled, this.quantity + quantity);
        return this; 
    }
    pourOut()  {
        const quantity = this.quantity;
        this.quantity = 0;
        return quantity;    
    }
    Glassfilled() {
        console.log(this.quantity);
    }
}
const s100 = new Glass(100);
const s150 = new Glass(150);
const s200 = new Glass(200);

s100.pour(30).Glassfilled();

// s100.pour(s200.pour(s150.pour(500).pourOut()).pourOut());

//  s100.Glassfilled();
//  s150.Glassfilled();
//  s200.Glassfilled();

