import { prisma } from '../config/prisma.js';

export const getCartData = async (req, res) => {
  try {
    const cart = await prisma.cart.findMany({
      where: { user_id: req.params.user_id },
    });
    res.status(200).send({
      message: 'GET CART',
      success: true,
      result: cart,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const addCartData = async (req, res) => {
  try {
    const cart = await prisma.cart.create({ data: req.body });
    res.status(200).send({
      message: 'ADD CART',
      success: true,
      result: cart,
    });
  } catch (error) {
    res.status(500).send({
      message: 'ADD CART ERROR',
      success: false,
    });
  }
};

export const updateDataCart = async (req, res) => {
  try {
    const cart = await prisma.cart.update({ data: req.body, where: { cart_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'UPDATE CART',
      success: true,
      result: cart,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'UPDATE CART ERROR',
      success: false,
    });
  }
};

export const deleteCartData = async (req, res) => {
  try {
    const cart = await prisma.cart.delete({ where: { cart_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'DELETE CART',
      success: true,
      result: cart,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'DELETE CART ERROR',
      success: false,
    });
  }
};
