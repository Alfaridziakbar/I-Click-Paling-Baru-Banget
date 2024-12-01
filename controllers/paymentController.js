import { prisma } from '../config/prisma.js';

export const getPayment = async (req, res) => {
  try {
    const orders = await prisma.payments.findMany();
    res.status(200).send({
      message: 'GET payment',
      success: true,
      result: orders,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const getPaymentById = async (req, res) => {
  try {
    const orderItem = await prisma.payments.findMany({ where: { payment_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'GET payment',
      success: true,
      result: orderItem,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};

export const addPayment = async (req, res) => {
  try {
    const newPayment = await prisma.payments.create({ data: req.body });
    res.status(200).send({
      message: 'ADD  New payment',
      success: true,
      result: newPayment,
    });
  } catch (error) {
    res.status(500).send({
      message: 'ADD payment ERROR',
      success: false,
    });
  }
};
