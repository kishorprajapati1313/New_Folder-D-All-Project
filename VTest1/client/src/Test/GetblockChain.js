import { ethers, Contract, BrowserProvider } from 'ethers'; // Use Web3Provider directly
import PaymentProcessor from "../Contracts/PaymentProcessor.json";
import Dai from "../Contracts/Dai.json";

const GetblockChain = async () => {
    if (window.ethereum) {
        try {
            await window.ethereum.request({ method: 'eth_requestAccounts' });
            const provider = new ethers.BrowserProvider(window.ethereum); // Use Web3Provider directly from ethers
            const signer = await provider.getSigner();
            // console.log(PaymentProcessor.networks[window.ethereum.networkVersion]?.address)

            const paymentProcessor = new Contract(
                PaymentProcessor.networks[window.ethereum.networkVersion]?.address,
                PaymentProcessor.abi,
                signer,
            );

            const dai = new Contract(
                Dai.networks[window.ethereum.networkVersion]?.address,
                Dai.abi,
                signer,
            );

            return { provider, paymentProcessor, dai };
        } catch (error) {
            console.error('Error initializing blockchain contracts:', error);
            return { provider:undefined,paymentProcessor: undefined, dai: undefined };
        }
    } else {
        console.error('Ethereum provider not found');
        return { paymentProcessor: undefined, dai: undefined };
    }
}

export default GetblockChain;
