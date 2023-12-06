class TV {
    static channels = ['LRT', 'TV3', 'LNK', 'Polonia', 'Discovery', 'Animal Planet'];
    
    static listChannels() {
        console.log('Available channels:');
        for (const channel of this.channels) {
            console.log(channel);
        }
    }
    
    
   constructor(brand, owner) {
       this.brand = brand;
       this.owner = owner;
       // this.channels = ['LRT', 'TV3', 'LNK', 'Polonia', 'Discovery', 'Animal Planet'];
    }
    changeChannel(number) {
        console.log(this.owner + ' ' + 'changing channel...' + this.constructor.channels[number]);
    }
    //
    whatsChannelsList() {
        this.constructor.listChannels();
    } 

    changeChannelsList(newChannels) {
        this.constructor.channels = newChannels;
    }
}

const petras = new TV('Samsung', 'Petras');
const maryte = new TV('LG', 'Maryte');
const bebras = new TV('Sony', 'Bebras');

petras.changeChannel(2);
maryte.changeChannel(3);
bebras.changeChannel(5);

const newChannels = ['MTV', 'VH1', 'CNN', 'Fox', 'BBC', 'TV6']; 

// TV.channels = newChannels;
bebras.changeChannelsList(newChannels);

petras.changeChannel(2);
maryte.changeChannel(3);
bebras.changeChannel(5);

TV.listChannels();

bebras.whatsChannelsList();
console.log(bebras);

// petras.channels = newChannels;


/*

    changeChannelsList();


*/