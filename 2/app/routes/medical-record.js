const router = require('express').Router()
const medicalRecordController = require('../controller/medical-record')

router.post('/medical-record/temperature', medicalRecordController.addRecordTemperature)
router.post('/medical-record/bloodpressure', medicalRecordController.addRecordBloodPressure)
router.post('/medical-record/sleep', medicalRecordController.addRecordSleep)
router.get('/medical-record', medicalRecordController.getAllRecord)
router.get('/medical-record/:id', medicalRecordController.getRecordById)

module.exports = router