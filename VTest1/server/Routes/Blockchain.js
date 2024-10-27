const express = require("express");
const Blockchainmodel = require("../Model/Blockchain");
const { ethers, Contract } = require("ethers");
const PaymentProcessor = require('../../client/src/Contracts/PaymentProcessor.json');
const router = express.Router();

const items= {
    '1': {id:1, url:"http://urldownload1"},
    '2': {id:2, url:"http://urldownload1"},
}

router.get("/B_payment/:itemId", async(req, res) => {
    const paymentId = (Math.random() * 10000).toFixed(0);

    const resp = await Blockchainmodel.create({
        id: paymentId,
        itemId: req.params.itemId,
        status:false,
    });

    res.status(200).json(resp);
})

router.get("/Itemurl/:paymentId", async(req,res) =>{
    const payment = await Blockchainmodel.findOne({id: req.params.paymentId});
    console.log(payment)
    if(payment && payment.status === true){
        res.status(200).json({ url: items[payment.itemId].url });
    }else{
        res.status(200).json({ url: ''});
    }
})

const listenEvents = () => {
    const provider = new ethers.JsonRpcProvider("http://localhost:9545"); // Ensure this matches your network
    const networkId = "5777"; // Ensure this matches your network ID

    const paymentProcessor = new Contract(
        PaymentProcessor.networks[networkId].address,
        PaymentProcessor.abi,
        provider
    );

    paymentProcessor.on('PaymentDone', async (payer, amount, paymentId, date) => {
        console.log(`
            from ${payer}
            amount ${amount}
            paymentId ${paymentId}
            date ${(new Date(date.toNumber() * 1000)).toLocaleString()}
        `);

        const payment = await Blockchainmodel.findOne({ id: paymentId });
        if (payment) {
            payment.status = true;
            await payment.save();
        }
    });
}


listenEvents();

module.exports = router;
