const express = require('express')
const { getAllData, getDataById, updateDataById, createData, deleteDataById } = require('../controllers/medicalController')
const router = express.Router()

router.get('/:id', getDataById)
router.put('/:id', updateDataById)
router.delete('/:id', deleteDataById)
router.get('/', getAllData)
router.post('/', createData)

module.exports = router