const rootHandler = (req, res) => {
    res.status(200).json({
        msg: "technical test ceXup",
        author: "irsyad abdul hamid",
    })
}

module.exports = { rootHandler }