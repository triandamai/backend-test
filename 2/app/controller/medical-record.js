const connection = require('../config/mysql-conn')

const addRecordTemperature = (req, res) => {
    let {
        id_member,
        id_nurse,
        type,
        method,
        diagnosis,
        note,
        mime_type,
        temperatur
    } = req.body

    if (type != 'temperature') {
        res.status(400).send({
            message: 'Medical Record Type is False'
        })
    } else {
        connection.query({
            sql: 'INSERT INTO medical_record (id_member, id_nurse, type, method, diagnosis, note, mime_type) VALUES (?,?,?,?,?,?,?)',
            values: [id_member, id_nurse, type, method, diagnosis, note, mime_type]
        }, (error, result) => {
            if (error) {
                res.send(error)
            } else {
                let id_checkup = result.insertId

                connection.query({
                    sql: 'INSERT INTO temperature (temperatur, id_checkup) VALUES (?,?)',
                    values: [temperatur, id_checkup]
                }, (error, result) => {
                    if (error) {
                        res.send(error)
                    } else {
                        res.status(200).send({
                            message: 'Successfully to insert data',
                            payload: result
                        })
                    }
                })
            }
        })
    }
}

const addRecordBloodPressure = (req, res) => {
    let {
        id_member,
        id_nurse,
        type,
        method,
        diagnosis,
        note,
        mime_type,
        systole,
        disatole
    } = req.body

    if (type != 'bloodpressure') {
        res.status(400).send({
            message: 'Medical Record Type is False'
        })
    } else {
        connection.query({
            sql: 'INSERT INTO medical_record (id_member, id_nurse, type, method, diagnosis, note, mime_type) VALUES (?,?,?,?,?,?,?)',
            values: [id_member, id_nurse, type, method, diagnosis, note, mime_type]
        }, (error, result) => {
            if (error) {
                res.send(error)
            } else {
                let id_checkup = result.insertId

                connection.query({
                    sql: 'INSERT INTO bloodpressure (systole, disatole, id_checkup) VALUES (?,?,?)',
                    values: [systole, disatole, id_checkup]
                }, (error, result) => {
                    if (error) {
                        res.send(error)
                    } else {
                        res.status(200).send({
                            message: 'Successfully to insert data',
                            payload: result
                        })
                    }
                })
            }
        })
    }
}

const addRecordSleep = (req, res) => {
    let {
        id_member,
        id_nurse,
        type,
        method,
        diagnosis,
        note,
        mime_type,
        sleep_start,
        sleep_end,
        deep_sleep,
        light_sleep,
        wakeTime
    } = req.body

    if (type != 'sleep') {
        res.status(400).send({
            message: 'Medical Record Type is False'
        })
    } else {
        connection.query({
            sql: 'INSERT INTO medical_record (id_member, id_nurse, type, method, diagnosis, note, mime_type) VALUES (?,?,?,?,?,?,?)',
            values: [id_member, id_nurse, type, method, diagnosis, note, mime_type]
        }, (error, result) => {
            if (error) {
                res.send(error)
            } else {
                let id_checkup = result.insertId

                connection.query({
                    sql: 'INSERT INTO sleep (sleep_start, sleep_end, deep_sleep, light_sleep, wakeTime, id_checkup) VALUES (?,?,?,?,?,?)',
                    values: [sleep_start, sleep_end, deep_sleep, light_sleep, wakeTime, id_checkup]
                }, (error, result) => {
                    if (error) {
                        res.send(error)
                    } else {
                        res.status(200).send({
                            message: 'Successfully to insert data',
                            payload: result
                        })
                    }
                })
            }
        })
    }
}

const getAllRecord = (req, res) => {
    let { page } = req.query
    let limit = 3
    let offset = (page - 1) * limit

    if (page) {
        sql = `SELECT m.*, t.temperatur, b.systole, b.disatole, s.sleep_start, s.sleep_end, s.deep_sleep, s.light_sleep, s.wakeTime FROM medical_record m 
            LEFT JOIN temperature t ON m.id=t.id_checkup LEFT JOIN bloodpressure b ON m.id=b.id_checkup LEFT JOIN sleep s ON m.id=s.id_checkup 
            WHERE t.id_checkup is not null or b.id_checkup is not null or s.id_checkup is not null ORDER BY m.id LIMIT ${limit} OFFSET ${offset}`
    } else {
        page = 1
        sql = `SELECT m.*, t.temperatur, b.systole, b.disatole, s.sleep_start, s.sleep_end, s.deep_sleep, s.light_sleep, s.wakeTime FROM medical_record m 
        LEFT JOIN temperature t ON m.id=t.id_checkup LEFT JOIN bloodpressure b ON m.id=b.id_checkup LEFT JOIN sleep s ON m.id=s.id_checkup 
        WHERE t.id_checkup is not null or b.id_checkup is not null or s.id_checkup is not null ORDER BY m.id LIMIT ${limit}`
    }

    connection.query({
        sql
    }, (error, result) => {
        if (error) {
            res.send(error)
        } else {
            let newRes = []
            result.forEach(e => {
                if (e.type == 'temperature') {
                    newRes.push({
                        id: e.id,
                        member_id: e.id_member,
                        nurse_id: e.id_nurse,
                        type: e.type,
                        value: e.temperatur,
                        method: e.method,
                        diagnosis: e.diagnosis,
                        note: e.note,
                        mime_type: e.mime_type,
                        created_at: e.created_at,
                        updated_at: e.updated_at
                    })
                } else if (e.type == 'bloodpressure') {
                    newRes.push({
                        id: e.id,
                        member_id: e.id_member,
                        nurse_id: e.id_nurse,
                        type: e.type,
                        value: {
                            systole: e.systole,
                            disatole: e.disatole
                        },
                        method: e.method,
                        diagnosis: e.diagnosis,
                        note: e.note,
                        mime_type: e.mime_type,
                        created_at: e.created_at,
                        updated_at: e.updated_at
                    })
                } else if (e.type == 'sleep') {
                    newRes.push({
                        id: e.id,
                        member_id: e.id_member,
                        nurse_id: e.id_nurse,
                        type: e.type,
                        value: {
                            sleepStart: e.sleep_start,
                            slepEnd: e.sleep_end,
                            deepSleep: e.deep_sleep,
                            lightSleep: e.light_sleep,
                            wakeTime: e.wakeTime
                        },
                        method: e.method,
                        diagnosis: e.diagnosis,
                        note: e.note,
                        mime_type: e.mime_type,
                        created_at: e.created_at,
                        updated_at: e.updated_at
                    })
                }
            });
            result = newRes
            res.status(200).send({
                properties: {
                    page: page,
                    limit: limit
                },
                result,
            })
        }
    })
}

const getRecordById = (req, res) => {
    let { id } = req.params
    connection.query({
        sql: `SELECT m.*, t.temperatur, b.systole, b.disatole, s.sleep_start, s.sleep_end, s.deep_sleep, s.light_sleep, s.wakeTime FROM medical_record m LEFT JOIN temperature t ON m.id=t.id_checkup LEFT JOIN bloodpressure b ON m.id=b.id_checkup LEFT JOIN sleep s ON m.id=s.id_checkup WHERE m.id=${id} AND (t.id_checkup is not null or b.id_checkup is not null or s.id_checkup is not null)`
    }, (error, result) => {
        if (error) {
            res.send(error)
        } else {
            let newRes = []
            result.forEach(e => {
                if (e.type == 'temperature') {
                    newRes.push({
                        id: e.id,
                        member_id: e.id_member,
                        nurse_id: e.id_nurse,
                        type: e.type,
                        value: e.temperatur,
                        method: e.method,
                        diagnosis: e.diagnosis,
                        note: e.note,
                        mime_type: e.mime_type,
                        created_at: e.created_at,
                        updated_at: e.updated_at
                    })
                } else if (e.type == 'bloodpressure') {
                    newRes.push({
                        id: e.id,
                        member_id: e.id_member,
                        nurse_id: e.id_nurse,
                        type: e.type,
                        value: {
                            systole: e.systole,
                            disatole: e.disatole
                        },
                        method: e.method,
                        diagnosis: e.diagnosis,
                        note: e.note,
                        mime_type: e.mime_type,
                        created_at: e.created_at,
                        updated_at: e.updated_at
                    })
                } else if (e.type == 'sleep') {
                    newRes.push({
                        id: e.id,
                        member_id: e.id_member,
                        nurse_id: e.id_nurse,
                        type: e.type,
                        value: {
                            sleepStart: e.sleep_start,
                            slepEnd: e.sleep_end,
                            deepSleep: e.deep_sleep,
                            lightSleep: e.light_sleep,
                            wakeTime: e.wakeTime
                        },
                        method: e.method,
                        diagnosis: e.diagnosis,
                        note: e.note,
                        mime_type: e.mime_type,
                        created_at: e.created_at,
                        updated_at: e.updated_at
                    })
                }
            });
            result = newRes
            res.status(200).send(result)
        }
    })
}


module.exports = {
    addRecordTemperature,
    addRecordBloodPressure,
    addRecordSleep,
    getAllRecord,
    getRecordById
}