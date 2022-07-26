const express = require('express')
const { rootHandler } = require('../controllers/rootController')
const router = express.Router()

const medicalRoute = require('./medicalRoute')

router.use('/medical', medicalRoute)

router.use('/', rootHandler)

module.exports = router