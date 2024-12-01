import { prisma } from '../config/prisma.js';

export const getAllOrderItems = async (req, res) => {
  try {
    const orderItem = await prisma.order_items.findMany();
    res.status(200).send({
      message: 'GET ORDER ITEMS',
      success: true,
      result: orderItem,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const getOrderItemsByOrderId = async (req, res) => {
  try {
    const orderItem = await prisma.order_items.findMany({ where: { order_id: parseInt(req.params.orderid) } });
    res.status(200).send({
      message: 'GET ORDER ITEMS',
      success: true,
      result: orderItem,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const addOrderItems = async (req, res) => {
  try {
    const orderItems = await prisma.order_items.create({ data: req.body });
    res.status(200).send({
      message: 'ADD ORDER ITEMS',
      success: true,
      result: orderItems,
    });
  } catch (error) {
    res.status(500).send({
      message: 'ADD ORDER ITEMS ERROR',
      success: false,
    });
  }
};
