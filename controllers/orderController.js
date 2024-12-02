import { prisma } from '../config/prisma.js';

export const getOrderData = async (req, res) => {
  try {
    const orders = await prisma.orders.findMany({ orderBy: { created_at: 'desc' } });
    res.status(200).send({
      message: 'GET ORDER',
      success: true,
      result: orders,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const getOrderDataById = async (req, res) => {
  try {
    const orders = await prisma.orders.findUnique({ where: { order_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'GET ORDER',
      success: true,
      result: orders,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};
export const getOrderDataByUser = async (req, res) => {
  try {
    const orders = await prisma.orders.findMany({ where: { user_id: parseInt(req.params.iduser) } });
    res.status(200).send({
      message: 'GET ORDER BY USER',
      success: true,
      result: orders,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const addNewOrder = async (req, res) => {
  try {
    const date = new Date().toJSON();
    const newOrder = await prisma.orders.create({ data: { ...req.body, created_at: date } });
    res.status(200).send({
      message: 'ADD NEW ORDER',
      success: true,
      result: newOrder,
    });
  } catch (error) {
    res.status(500).send({
      message: 'ADD ORDER ERROR',
      success: false,
    });
  }
};

export const deleteOrder = async (req, res) => {
  try {
    const order = await prisma.orders.delete({ where: { order_id: parseInt(req.params.id) } });
    const orderItem = await prisma.order_items.deleteMany({ where: { order_id: order.order_id } });
    res.status(200).send({
      message: 'DELETE PRODUCT',
      success: true,
      result: { order, orderItem },
    });
  } catch (error) {
    res.status(500).send({
      message: 'DELETE ORDER ERROR',
      success: false,
    });
  }
};
