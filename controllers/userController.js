import { prisma } from '../config/prisma.js';

export const getDataUser = async (req, res) => {
  try {
    if (req.query.user_id) req.query.user_id = parseInt(req.query.user_id);
    const users = await prisma.user.findMany({
      where: req.query,
    });
    res.status(200).send({
      message: 'GET ALL USERS',
      success: true,
      result: users,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'GET USERS ERROR',
      success: false,
    });
  }
};

export const addDataUser = async (req, res) => {
  try {
    const users = await prisma.user.create({ data: req.body });
    res.status(200).send({
      message: 'ADD USER',
      success: true,
      result: users,
    });
  } catch (error) {
    res.status(500).send({
      message: 'ADD USER ERROR',
      success: false,
    });
  }
};

export const updateDataUser = async (req, res) => {
  try {
    const users = await prisma.user.update({ data: req.body, where: { user_id: parseInt(req.params.id) } });
    res.status(200).send({
      message: 'UPDATE USERS',
      success: true,
      result: users,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send({
      message: 'UPDATE USER ERROR',
      success: false,
    });
  }
};
