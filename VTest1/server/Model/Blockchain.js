const mongoose = require("mongoose");

const blockchainSchema = new mongoose.Schema({
    id: String,
    itemId: String,
    status: Boolean,
});

const blockchainmodel = mongoose.model("blockchain", blockchainSchema);
module.exports = blockchainmodel;