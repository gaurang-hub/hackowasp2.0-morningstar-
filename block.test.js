const Block = require('./block');
const {GENESIS_DATA, MINE_RATE} = require('./config');
const cryptoHash = require('./crypto-hash');
const hexToBinary = require('hex-to-binary');
describe('Block',() => {
    const timeStamp = 2000;
    const lastHash = 'foo-hash';
    const hash = 'bar-hash';
    const data = ['foo-data', 'bar-data'];
    const nonce = 1;
    const difficulty = 1;
    const block = new Block({
        timeStamp: timeStamp,
        lastHash: lastHash,
        hash: hash,
        data: data,
        nonce,
        difficulty
    });

    it('has a timestamp, lasthash, hash and a data',() => {
        expect(block.timeStamp).toEqual(timeStamp);
        expect(block.lastHash).toEqual(lastHash);
        expect(block.hash).toEqual(hash);
        expect(block.data).toEqual(data);
        expect(block.nonce).toEqual(nonce);
        expect(block.difficulty).toEqual(difficulty);
    })
    describe('genesis()',() => {
        const genesisBlock = Block.genesis();
        it('returns an instance of block',() => {
            expect(genesisBlock instanceof Block).toBe(true);
        });
        it('returns the genesis data', () => {
            expect(genesisBlock).toEqual(GENESIS_DATA);
        });
    });
    describe('mineBlock()', () => {
        const lastBlock = Block.genesis();
        const data = 'mined data';
        const minedBlock = Block.mineBlock({lastBlock, data});
        it('returns an instance of a block', () => {
            expect(minedBlock instanceof Block).toBe(true);
        });
        it('has a `data`', () => {
            expect(minedBlock.data).toEqual(data);
        });
        it('`lastHash` is equal to `hash` of the last block', () => {
            expect(minedBlock.lastHash).toEqual(lastBlock.hash);
        });
        it('has a `timestamp`', () => {
            expect(minedBlock.timeStamp).not.toEqual(undefined);
        });
        it('prduce a SHA-256 `hash` string', () => {
            expect(minedBlock.hash).toEqual(cryptoHash(minedBlock.timeStamp, lastBlock.hash, data, minedBlock.nonce, minedBlock.difficulty));
        });
        it('sets a `hash` that matches the difficulty level', () => {
            expect(hexToBinary(minedBlock.hash).substring(0,minedBlock.difficulty)).toEqual('0'.repeat(minedBlock.difficulty));
        });
        it('adjusts the difficulty', () => {
            const possibleResults = [lastBlock.difficulty+1, lastBlock.difficulty-1];
            expect(possibleResults.includes(minedBlock.difficulty)).toBe(true);
        });
    });
    describe('adjustDifficulty()', () => {
        it('raises the difficulty for a quickly mined block', () => {
            expect(Block.adjustDifficulty({ originalBlock: block, timeStamp: block.timeStamp + MINE_RATE - 100}))
            .toEqual(block.difficulty + 1);
        });
        it('lowers the difficulty for a slowly mined block', () => {
            expect(Block.adjustDifficulty({ originalBlock: block, timeStamp: block.timeStamp + MINE_RATE + 100}))
            .toEqual(block.difficulty - 1);
        });
        it('has a lower limit of 1', () => {
            block.difficulty = - 1;
            expect(Block.adjustDifficulty({ originalBlock: block})).toEqual(1);
        })
    });
});
