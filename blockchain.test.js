const Blockchain = require('./blockchain');
const Block = require('./block');
const cryptoHash = require('./crypto-hash');

describe('Blockchain', () => {
    let blockchain, newChain, originalChain;
    beforeEach(() => {
        blockchain = new Blockchain();
        newChain = new Blockchain();
        originalChain = blockchain.chain;
    });
    it('contain a `chain` array instance', () => {
        expect(blockchain.chain instanceof Array).toBe(true);
    });
    it('starts with the genesis block', () => {
        expect(blockchain.chain[0]).toEqual(Block.genesis());
    });
    it('adds a new block to the chain', () => {
        const newData = 'foo-data';
        blockchain.addBlock({data: newData});
        expect(blockchain.chain[blockchain.chain.length - 1].data).toEqual(newData);
    });
    describe('isValidChain()', () => {
        describe('when chain doesnt start with the genesis block', () => {
            it('returns flase', () => {
                blockchain.chain[0] = {data: 'fake'};
                expect(Blockchain.isValidChain(blockchain.chain)).toBe(false);
            });
        });
        describe('when the chain does start with the genesis block and chain has many blocks', () => {
            describe('and a lastHash refernce has changed', () => {
                it('returns false', () => {
                    blockchain.addBlock({data: 'bees'});
                    blockchain.addBlock({data: 'bears'});
                    blockchain.addBlock({data: 'ants'});

                    blockchain.chain[2].lastHash = 'broken-lastHash';
                    expect(Blockchain.isValidChain(blockchain.chain)).toBe(false);
                });
            });
            describe('and the chain contains a block with invalid field', () => {
                it('returns flase', () => {
                    blockchain.addBlock({data: 'bees'});
                    blockchain.addBlock({data: 'bears'});
                    blockchain.addBlock({data: 'ants'});
                    blockchain.chain[2].data = 'evil-data';
                    expect(Blockchain.isValidChain(blockchain.chain)).toBe(false);
                });
            });
            describe('the chain does not contain any invalid blocks', () => {
                it('returns true', () => {
                    blockchain.addBlock({data: 'bees'});
                    blockchain.addBlock({data: 'bears'});
                    blockchain.addBlock({data: 'ants'});
                    expect(Blockchain.isValidChain(blockchain.chain)).toBe(true);
                });
            });
            describe('and the contains a jumped difficulty', () => {
                it('returns false', () => {
                    blockchain.addBlock({data: 'bees'});
                    blockchain.addBlock({data: 'bears'});
                    blockchain.addBlock({data: 'ants'});
                    const lastBlock = blockchain.chain[blockchain.chain.length - 1];
                    const lastHash = lastBlock.hash;
                    const timeStamp = Date.now();
                    const nonce = 0;
                    const data = [];
                    const difficulty = lastBlock.difficulty - 3;
                    const hash = cryptoHash(timeStamp,lastHash,difficulty,nonce,data);
                    const badBlock = new Block({
                        timeStamp,
                        lastHash,
                        data,
                        difficulty,
                        nonce
                    });
                    blockchain.chain.push(badBlock);
                    expect(Blockchain.isValidChain(blockchain.chain)).toBe(false);
                });
            });
        });
    });
    describe('replaceChain()', () => {
        let errorMock, logMock;
        beforeEach(() => {
            errorMock = jest.fn();
            logMock = jest.fn();
            global.console.error = errorMock;
            global.console.log = logMock;
        });
        describe('when the new chain is not longer', () => {
            beforeEach(() => {
                newChain.chain[0] = {new: 'chain'};
                blockchain.replaceChain(newChain.chain);
            });
            it('does not replace the chain', () => {
                expect(blockchain.chain).toEqual(originalChain);
            });
            it('logs an error', () => {
                expect(errorMock).toHaveBeenCalled();
            });
        });
        describe('when the new chain is longer', () => {
            beforeEach(() => {
                newChain.addBlock({data: 'bees'});
                newChain.addBlock({data: 'bears'});
                newChain.addBlock({data: 'ants'});
            });
            describe('and the chain is invalid', () => {
                it('does not replace the chain', () => {
                    newChain.chain[2].hash = 'broken-lastHash';
                    blockchain.replaceChain(newChain.chain);
                    expect(blockchain.chain).toEqual(originalChain);
                });
            });
            describe('and the chain is valid', () => {
                beforeEach(() => {
                    blockchain.replaceChain(newChain.chain);
                });
                it('does replace the chain', () => {
                    expect(blockchain.chain).toEqual(newChain.chain);
                });
                it('logs about the chain replacement', () => {
                    expect(logMock).toHaveBeenCalled();
                });
            });
        });
    });
});