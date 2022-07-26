const request = require('supertest')
const app = require('./app')
const { loadData } = require('./models/medicalModel')

describe('Test the root path', () => {
    test('It should response status 200 and welcome message', async () => {
        const response = await request(app).get('/')
        expect(response.statusCode).toBe(200)
        expect(response.body).toEqual(
            expect.objectContaining({
                msg: expect.any(String),
                author: expect.any(String),
            })
        )
    })
})

describe('Test the get all medical data path', () => {
    test('It should response status 200 and medical data', async () => {
        const response = await request(app).get('/medical')
        expect(response.statusCode).toBe(200)
        expect(response.body).toEqual(
            expect.objectContaining({
                msg: expect.any(String),
                limit: expect.any(Number),
                page: expect.any(Number),
                totalDocs: expect.any(Number),
                docs: expect.any(Array),
            })
        )
    })
})

describe('Test the get one medical data path', () => {
    test('It should response status 200 and medical data', async () => {
        const medicals = loadData()
        const lastId = Math.max(...medicals.map(item => item.id))

        const response = await request(app).get('/medical/' + lastId)
        expect(response.statusCode).toBe(200)
        expect(response.body).toEqual(
            expect.objectContaining({
                msg: expect.any(String),
                data: expect.any(Object),
            })
        )
    })
})

describe('Test the create medical data path', (done) => {
    test('It should take request, response status 200 and medical data', async () => {
        const medical = {
            member_id: "CXPq9AD0XZoOO",
            nurse_id: "CXPq9AD0XZoRR",
            type: "BLOODPRESSURE",
            value: {
                systole: "",
                disatole: ""
            },
            method: "MANUAL",
            diagnosis: "diagnosis",
            note: "ini adalah note baru",
            mime_type: "text"
        }
        const countMedical = loadData().length;
        const response = await request(app).post('/medical').send(medical)

        const newCountMedical = loadData().length

        expect(response.statusCode).toEqual(201)
        expect(response.body).toEqual(
            expect.objectContaining({
                msg: expect.any(String),
                data: expect.any(Object),
            })
        )
        expect(newCountMedical).toEqual(countMedical + 1);
    })
})

describe('Test the update one medical data path', (done) => {
    test('It should take request, response status 200 and medical data', async () => {
        const medical = {
            member_id: "CXPq9AD0XZoOO",
            nurse_id: "CXPq9AD0XZoRR",
            type: "BLOODPRESSURE",
            value: {
                systole: "",
                disatole: ""
            },
            method: "MANUAL",
            diagnosis: "diagnosis",
            note: "ini note yang diubah",
            mime_type: "text"
        }

        const medicals = loadData()

        const lastId = Math.max(...medicals.map(item => item.id))
        const response = await request(app).put('/medical/' + lastId).send(medical)

        expect(response.statusCode).toEqual(200)
        expect(response.body).toEqual(
            expect.objectContaining({
                msg: expect.any(String),
                data: expect.any(Object),
            })
        )
    })
})

describe('Test the delete one medical data path', () => {
    test('It should response status 200 and medical data', async () => {
        const medicals = loadData()
        const lastId = Math.max(...medicals.map(item => item.id))

        const response = await request(app).delete('/medical/' + lastId)
        expect(response.statusCode).toBe(200)
        expect(response.body).toEqual(
            expect.objectContaining({
                msg: expect.any(String),
                data: expect.any(Object),
            })
        )
    })
})