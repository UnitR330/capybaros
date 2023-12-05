console.log('confirm');
/*
class Kibiras1 {
    constructor() {
        this.akmenuKiekis = 0;
    }
    predetiAkmenu()  {
        this.akmenuKiekis++;
    }
    pridetiDaugAkmenu(kiekis)  {
this.akmenuKiekis += kiekis;
    }
kiek
}
const kibiras1 = new Kibiras1
const kibiras2 = new Kibiras1
const kibiras3 = new Kibiras1

kibiras1.predetiAkmenu();
kibiras1.predetiAkmenu();
kibiras1.predetiAkmenu();
kibiras1.predetiAkmenu();
kibiras1.predetiAkmenu();
*/


//8 

class Stikline {
constructor(turis)  {
    this.turis = turis;
    this.kiekis = 0;
}
ipilti(kiekis) {
    this.kiekis = Math.min(this.turis, this.kiekis + kiekis);
    return this; 
}
ispilti(kiekis)  {
    const kiekis = this.kiekis;
    this.kiekis = 0;
    return kiekis;    
}
stiklineYra() {
    console.log(this.kiekis);
}
}
const s100 = new Stikline(100);
const s150 = new Stikline(150);
const s200 = new Stikline(200);

// s200.ipilti(s200.ipilti(s150.ipilti(500).ispilti()).ispilti());

// s100.stiklineYra();
// s150.stiklineYra();
// s200.stiklineYra();

s100.ipilti(30).stiklineYra();