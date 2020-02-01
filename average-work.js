const Blockchain = require('./blockchain');
const blockchain = new Blockchain();
blockchain.addBlock({ data: 'initial' });
let prevTimeStamp, nextTimeStamp, nextBlock, timeDiff, average;

const times = [];
console.log(blockchain.chain[blockchain.chain.length - 1]); 
for(let i = 0; i<10000; i++){
    prevTimeStamp = blockchain.chain[blockchain.chain.length - 1].timeStamp;
    blockchain.addBlock({ data: `block ${i}`});
    nextBlock = blockchain.chain[blockchain.chain.length - 1];
    nextTimeStamp = nextBlock.timeStamp;
    timeDiff = nextTimeStamp - prevTimeStamp;
    times.push(timeDiff);
    average = times.reduce((total, num) => (total + num))/times.length;
    console.log(`time to mine block ${timeDiff}ms. Difficulty: ${nextBlock.difficulty}. Average Time: ${average}ms.`);
}