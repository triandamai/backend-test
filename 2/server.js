const express = require('express')
const port = process.env.PORT || 3001
const medicalRecordRouter = require('./app/routes/medical-record')

const app = express()

app.use(express.json())
app.use(express.urlencoded({extended:true}))

app.use('/api', medicalRecordRouter)

app.use((req,res,next)=>{
    res.status(404).send({
        message: `Resource ${req.originalUrl} not found`
    })
})

app.listen((port),()=>{console.log(`server running at port: ${port}`)})