const fs = require('fs')

const pathFile = './database/medicalDatabase.json'

const loadData = () => JSON.parse(fs.readFileSync(pathFile)).sort((a, b) => a.id - b.id);

const storeData = (data) => fs.writeFileSync(pathFile, JSON.stringify(data.sort((a, b) => a.id - b.id), null, 4))

module.exports = { loadData, storeData }