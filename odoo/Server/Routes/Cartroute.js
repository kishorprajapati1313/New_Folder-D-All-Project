const express = require("express");
const router = express.Router();
const productmodel = require("../Model/Product.js");
const signmodel = require("../Model/signmodel");
const cartmodel = require("../Model/Cart.js")
const stripe = require("stripe")("sk_test_51PixwjLNhOKIvAm03G4ROQn2oNQYatvI04p0RS6WYp5lw0G5B5S0LZPQEFwaUPd6KuNd5WMhlelwP4sH4uV8zLzw00sLtifqUJ");

router.post("/cart/add", async (req, res) => {
    const { userid, productid } = req.body;
    try {
        console.log(userid)
        const user = await signmodel.findOne({ _id: userid })
        if (user) {
            const cartItem = new cartmodel({ userid, productid });

            // Save the cart item to the database
            await cartItem.save();
            res.status(201).json({ message: 'Product added to cart successfully', cartItem });
        } else {
            res.status(201).json({ message: "not extis fail" })
        }

    } catch (error) {
        res.status(500).json({ message: "internal failure" })
    }
})

router.get('/getcart', async (req, res) => {
    const {userid}  =req.query;
    try {
       const cartItems = await cartmodel.find({ userid });

       if (!cartItems || cartItems.length === 0) {
        return res.status(404).json({ message: "No cart items found for the user" });
    }

    const productDetailPromises = cartItems.map(async (cartItem) => {
        const product = await productmodel.find({productid: cartItem.productid});
        product.image = `data:image/png;base64, ${product.image}`;

        return product;
    });

    // Wait for all product details promises to resolve
    const productDetails = await Promise.all(productDetailPromises);

    const response = {
        cartItems: cartItems,
        products: productDetails,
    };
    console.log(response.products)

    res.status(200).json(response);
    } catch (error) {
      console.error('Error fetching cart products:', error);
      res.status(500).json({ error: 'Internal Server Error' });
    }
  });
  
  router.post("/checkout-session", async (req, res) => {
    try {
        const { checkoutData } = req.body;

        const lineItems = checkoutData.products.map((product) => ({
            price_data: {
                currency: "usd",
                product_data: {
                    name: `Product ${product.productid}`, // Use a more descriptive name if available
                },
                unit_amount: Math.round(product.rentingPrice * 100), // Convert to cents
            },
            quantity: product.quantity,
        }));

        const session = await stripe.checkout.sessions.create({
            payment_method_types: ["card"],
            line_items: lineItems,
            mode: "payment",
            success_url: "http://localhost:3003/success",
            cancel_url: "http://localhost:3003/cart",
        });

        res.json({ id: session.id });
    } catch (error) {
        console.error('Error creating Stripe checkout session:', error);
        res.status(500).json({ error: 'Internal Server Error' });
    }
});
module.exports = router;