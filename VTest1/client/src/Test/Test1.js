import React, { useEffect, useState } from 'react';
import GetblockChain from './GetblockChain';
import Store from './Store';

const Test1 = () => {
    const [paymentProcessor, setPaymentProcessor] = useState(null);
    const [dai, setDai] = useState(null);

    useEffect(() => {
        const init = async () => {
            try {
                const result = await GetblockChain();
                console.log(result);
                if (result) {
                    const {paymentProcessor, dai } = result;
                    setPaymentProcessor(paymentProcessor);
                    setDai(dai);
                } else {
                    console.error('Failed to initialize blockchain contracts.');
                }
            } catch (error) {
                console.error('Error initializing blockchain contracts:', error);
            }
        };
        init();
    }, []);

    if (typeof window.ethereum === "undefined") {
        return (
            <div>
                Ethereum provider is not detected. Please install MetaMask.
            </div>
        );
    }

    return (
        <div>
            <Store paymentProcessor={paymentProcessor} dai={dai} />
        </div>
    );
};

export default Test1;
