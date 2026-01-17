const express = require('express');
const router = express.Router();
const brandController = require('../controllers/brandController');
const authMiddleware = require('../middleware/authMiddleware');
const authorizationMiddleware = require('../middleware/authorizationMiddleware');

router.get('/', [authMiddleware], brandController.getAllBrands);
router.get('/:id', [authMiddleware], brandController.getBrandById);
router.post('/', [authMiddleware, authorizationMiddleware('group_master')], brandController.createBrand);
router.put('/:id', [authMiddleware, authorizationMiddleware('group_master')], brandController.updateBrand);
router.delete('/:id', [authMiddleware, authorizationMiddleware('group_master')], brandController.deleteBrand);

module.exports = router;
