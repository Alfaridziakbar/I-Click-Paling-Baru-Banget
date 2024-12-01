import express from 'express';
import cors from 'cors';
import dotenv from 'dotenv';
// import userRouter from './route/userRouter.js';
import { addDataUser, getDataUser, updateDataUser } from './controllers/userController.js';
import { addDataProduct, deleteDataProduct, getDataProduct, updateDataProduct } from './controllers/productController.js';
import { addCartData, deleteCartData, getCartData, updateDataCart } from './controllers/cartController.js';
import { getProductByCategory } from './controllers/categoryController.js';
import { addOrderItems, getAllOrderItems, getOrderItemsByOrderId } from './controllers/orderItemController.js';
import { addNewOrder, deleteOrder, getOrderData, getOrderDataById, getOrderDataByUser } from './controllers/orderController.js';
import { addPayment, getPayment, getPaymentById } from './controllers/paymentController.js';
dotenv.config();

const PORT = process.env.PORT;

const app = express();
app.use(cors());
app.use(express.json());

app.get('/', (req, res) => {
  res.status(200).send('ecom database');
});

// users
app.get('/users', getDataUser);
app.post('/users', addDataUser);
app.patch('/users/:id', updateDataUser);

// product
app.get('/products', getDataProduct);
app.post('/products', addDataProduct);
app.patch('/products/:id', updateDataProduct);
app.delete('/products/:id', deleteDataProduct);

// cart
app.get('/cart/:id', getCartData);
app.post('/cart', addCartData);
app.patch('/cart/:id', updateDataCart);
app.delete('/cart/:id', deleteCartData);

//categories
app.get('/category/:name', getProductByCategory);

// order items
app.get('/order/items', getAllOrderItems);
app.get('/order/items/:orderid', getOrderItemsByOrderId);
app.post('/order/items', addOrderItems);

// order
app.get('/order', getOrderData);
app.get('/order/:id', getOrderDataById);
app.get('/order/user/:iduser', getOrderDataByUser);
app.post('/order', addNewOrder);
app.delete('/order/:id', deleteOrder);

// payment
app.get('/payment', getPayment);
app.get('/payment/:id', getPaymentById);
app.post('/payment', addPayment);

app.listen(PORT, () => {
  console.log('Database Running at Port', PORT);
});
