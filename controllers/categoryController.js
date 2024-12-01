import { prisma } from '../config/prisma.js';

export const getProductByCategory = async (req, res) => {
  try {
    const category = await prisma.category.findMany({ where: { name: req.params.name } });
    const product = await prisma.product.findMany({ where: { category_id: category[0].category_id } });
    res.status(200).send({
      message: 'GET CART',
      success: true,
      result: product,
    });
  } catch (error) {
    res.status(500).send(error);
  }
};
