const { loadData, storeData } = require("../models/medicalModel")

const getAllData = (req, res) => {
    try {
        const { page, limit } = req.query
        const currentPage = parseInt(page || 1)
        const currentLimit = parseInt(limit || 2)

        let medicals = loadData().slice((currentPage - 1) * currentLimit, currentPage * currentLimit)

        return res.status(200).json({
            msg: 'get all medical data',
            limit: currentLimit,
            page: currentPage,
            totalDocs: medicals.length,
            docs: medicals,
        })
    } catch (error) {
        return res.status(500).json({
            msg: error.message
        })
    }
}

const getDataById = (req, res) => {
    try {
        const id = req.params.id

        let medical = loadData().find(item => item.id == id)

        if (!medical) {
            return res.status(404).json({
                msg: 'data not found',
            })
        }

        return res.status(200).json({
            msg: 'get one medical data by id',
            data: medical,
        })
    } catch (error) {
        return res.status(500).json({
            msg: error.message
        })
    }
}

const createData = (req, res) => {
    try {
        const { member_id, nurse_id, type, value, method, diagnosis, note, mime_type } = req.body

        if (!member_id || !nurse_id || !type || !value || !method || !diagnosis || !note || !mime_type) {
            return res.status(400).json({
                msg: 'member_id, nurse_id, type, value, method, diagnosis, note, mime_type is required',
            })
        }

        let medicals = loadData()
        let newId = Math.max(...medicals.map(item => item.id)) + 1

        let medical = {}
        medical.id = newId.toString()
        medical.member_id = member_id
        medical.nurse_id = nurse_id
        medical.type = type
        medical.value = value
        medical.method = method
        medical.diagnosis = diagnosis
        medical.note = note
        medical.mime_type = mime_type
        medical.created_at = Date.now()
        medical.updated_at = Date.now()

        storeData([
            ...medicals,
            medical
        ])

        return res.status(201).json({
            msg: 'create medical data succeed',
            data: medical,
        })
    } catch (error) {
        return res.status(500).json({
            msg: error.message
        })
    }
}

const updateDataById = (req, res) => {
    try {
        const id = req.params.id
        const { member_id, nurse_id, type, value, method, diagnosis, note, mime_type } = req.body

        if (!member_id || !nurse_id || !type || !value || !method || !diagnosis || !note || !mime_type) {
            return res.status(400).json({
                msg: 'member_id, nurse_id, type, value, method, diagnosis, note, mime_type is required',
            })
        }

        let medicals = loadData()
        let medical = medicals.find(item => item.id == id)

        if (!medical) {
            return res.status(404).json({
                msg: 'data not found',
            })
        }

        medicals = medicals.filter(item => item.id != id)

        medical.member_id = member_id
        medical.nurse_id = nurse_id
        medical.type = type
        medical.value = value
        medical.method = method
        medical.diagnosis = diagnosis
        medical.note = note
        medical.mime_type = mime_type
        medical.updated_at = Date.now()

        storeData([
            ...medicals,
            medical
        ])

        return res.status(200).json({
            msg: 'update medical data succeed',
            data: medical,
        })
    } catch (error) {
        return res.status(500).json({
            msg: error.message
        })
    }
}

const deleteDataById = (req, res) => {
    try {
        const id = req.params.id

        let medical = loadData().find(item => item.id == id)

        if (!medical) {
            return res.status(404).json({
                msg: 'data not found',
            })
        }

        let medicals = loadData()
        medicals = medicals.filter(item => item.id != id)
        storeData(medicals)

        return res.status(200).json({
            msg: 'delete medical data succeed',
            data: medical,
        })
    } catch (error) {
        return res.status(500).json({
            msg: error.message
        })
    }
}

module.exports = { getAllData, getDataById, createData, updateDataById, deleteDataById }