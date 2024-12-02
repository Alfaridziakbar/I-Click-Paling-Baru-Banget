import { prisma } from '../config/prisma.js';

export const getDataProduct = async (req, res) => {
  try {
    if (req.query.product_id) req.query.product_id = parseInt(req.query.product_id);
    const products = await prisma.product.findMany({
      where: req.query,
    });
    res.status(200).send({
      message: 'GET ALL PRODUCTS',
      success: true,
      result: products,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'GET PRODUCTS ERROR',
      success: false,
    });
  }
};

export const addDataProduct = async (req, res) => {
  try {
    const product = await prisma.product.create({ data: req.body });
    res.status(200).send({
      message: 'ADD PRODUCT',
      success: true,
      result: product,
    });
  } catch (error) {
    res.status(500).send({
      message: 'ADD PRODUCTS ERROR',
      success: false,
    });
  }
};

export const updateDataProduct = async (req, res) => {
  try {
    const product = await prisma.product.update({ data: req.body, where: { product_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'UPDATE PRODUCT',
      success: true,
      result: product,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'UPDATE PRODUCT ERROR',
      success: false,
    });
  }
};

export const deleteDataProduct = async (req, res) => {
  try {
    const product = await prisma.product.delete({ where: { product_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'DELETE PRODUCT',
      success: true,
      result: product,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'DELETE PRODUCT ERROR',
      success: false,
    });
  }
};
