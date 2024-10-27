import React from 'react';
import { ethers } from 'ethers';
import axios from 'axios';

const ITEM = [
    {
        id: 1,
        price: ethers.parseUnits('100', 'ether')
    },
    {
        id: 2,
        price: ethers.parseUnits('500', 'ether')
    },
];

const Store = ({ paymentProcessor, dai }) => {
    console.log(dai)

    const handleClick = async (item) => {
        try {
            const itemId = item.id;
            const response = await axios.get(`http://localhost:5000/B_payment/${itemId}`);

            if (dai && paymentProcessor) {
                console.log(0)
                
                const tx1 = await dai.approve(paymentProcessor.target, item.price);
                await tx1.wait();
                console.log(1)
                
                const tx2 = await paymentProcessor.pay(item.price, response.data.id);
                await tx2.wait();
                console.log(2)

                await new Promise(resolve => setTimeout(resolve, 5000));
                
                const response2 = await axios.get(`http://localhost:5000/Itemurl/${response.data.id}`);
                console.log(response2.data);
            } else {
                console.error('Contracts not initialized.');
            }
        } catch (error) {
            console.error('Error processing payment:', error);
        }
    };

    return (
        <div>
            BUY ITEM 1 - <button onClick={() => handleClick(ITEM[0])}>CLICK ME TO BUY</button> <br />
            BUY ITEM 2 - <button onClick={() => handleClick(ITEM[1])}>CLICK ME TO BUY</button>
        </div>
    );
};

export default Store;
